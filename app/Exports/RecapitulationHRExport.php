<?php
namespace App\Exports;

use Carbon\Carbon;
use App\Models\User;
use App\Models\SyncDate;
use App\Models\RecapitulationHR;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class RecapitulationHRExport implements FromCollection, WithHeadings, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $date = SyncDate::first();

        // Users without attendance, karakter, or LKH should be included with zeros
        $allUsers = User::select('users.id', 'users.name', 'offices.name as office_name', 'roles.name as role_name')
            ->leftJoin('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->leftJoin('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->leftJoin('offices', 'users.office_id', '=', 'offices.id')
            ->leftJoin('attendances', function ($join) use ($date) {
                $join->on('users.id', '=', 'attendances.user_id')
                    ->whereBetween('attendances.created_at', [$date->date_start, $date->date_end]);
            })
            ->leftJoin('attendance_details as detail', 'attendances.id', '=', 'detail.attendance_id')
            ->leftJoin('karakters as karakter', function ($join) use ($date) {
                $join->on('users.id', '=', 'karakter.user_id')
                    ->whereBetween('karakter.created_at', [$date->date_start, $date->date_end]);
            })
            ->leftJoin('cutis', function ($join) {
                $join->on('users.id', '=', 'cutis.user_id')
                    ->where('cutis.status', 'approved'); // Join only approved leave records
            })
            ->leftJoin('izins', function ($join) {
                $join->on('users.id', '=', 'izins.user_id')
                    ->where('izins.status', 'approved'); // Join only approved leave records
            })
            ->leftJoin('point_lkh_santris', function ($join) use ($date) {
                $join->on('users.id', '=', 'point_lkh_santris.user_id')
                    ->whereBetween('point_lkh_santris.created_at', [$date->date_start, $date->date_end]);
            })
            ->groupBy('users.id', 'users.name', 'offices.name', 'roles.name')
            ->selectRaw('COUNT(DISTINCT cutis.id) AS total_accepted_cuti') // Use DISTINCT to count only unique cuti records
            ->selectRaw('COUNT(DISTINCT izins.id) AS total_accepted_izin') // Use DISTINCT for izin records as well
            ->selectRaw('COALESCE(SUM(DISTINCT CASE WHEN detail.type = "in" THEN detail.point ELSE 0 END), 0) AS total_points_datang')
            ->selectRaw('COALESCE(SUM(DISTINCT CASE WHEN detail.type = "out" THEN detail.point ELSE 0 END), 0) AS total_points_pulang')
            ->selectRaw('COALESCE(SUM(DISTINCT CASE WHEN karakter.type = "tilawah" THEN karakter.poin ELSE 0 END), 0) AS total_points_tilawah')
            ->selectRaw('COALESCE(SUM(DISTINCT CASE WHEN karakter.type = "tahajud" THEN karakter.poin ELSE 0 END), 0) AS total_points_tahajud')
            ->selectRaw('COALESCE(SUM(DISTINCT point_lkh_santris.point_lkh), 0) AS total_points_lkh')
            ->selectRaw('COALESCE(SUM(DISTINCT point_lkh_santris.point_kehadiran), 0) AS total_points_kehadiran')
            ->orderBy('users.name', 'asc')
            ->get();

        // Merge the reports
        $mergedData = $allUsers->map(function ($user) use ($date) {
            $office = User::where('id', $user->id)->first()->office;
            return [
                'Nama Santri' => $user->name,
                'Office' => $office->name ?? 'Unknown',
                'Role' => $user->role_name,
                'Total Hari' => $date->total_day,
                'Hari Aktif' => $date->active_day,
                'Datang Pulang' => $user->total_points_datang + $user->total_points_pulang,
                '%' => $date->active_day > 0 
                    ? round((($user->total_points_datang + $user->total_points_pulang) / $date->active_day) * 100, 2) . '%' 
                    : '0%',
                'Tilawah' => $user->total_points_tilawah,
                'Tilawah %' => $date->total_day > 0 
                    ? round(($user->total_points_tilawah / $date->total_day) * 100, 2) . '%' 
                    : '0%',
                'Tahajud' => $user->total_points_tahajud,
                'Tahajud %' => $date->total_day > 0 
                ? round(($user->total_points_tahajud / $date->total_day) * 100, 2) . '%' 
                : '0%',
                'LKH' => $user->total_points_lkh,
                'LKH %' => $date->active_day > 0 
                    ? round(($user->total_points_lkh / $date->active_day) * 100, 2) . '%' 
                    : '0%',
                'Kehadiran' => $user->total_points_kehadiran,
                'Kehadiran %' => $date->active_day > 0 
                    ? round(($user->total_points_kehadiran / $date->active_day) * 100, 2) . '%' 
                    : '0%',
                'Izin' => $date->active_day > 0 
                    ? $user->total_accepted_izin  
                    : '0',
                'Cuti' => $date->active_day > 0 
                    ? $user->total_accepted_cuti  
                    : '0',
            ];
        });
        
        $startPeriode = Carbon::parse($date->date_start)->format('MMMM YY'); // Example: "January 2025"
        $endPeriode = Carbon::parse($date->date_end)->isoFormat('MMMM YY');  
        $note = "Rekapitulasi HR Santri ($endPeriode)";

        // Save the result to the database
        $savedReport = RecapitulationHR::create([
            'note' => $note ,
            'start_periode' => $date->date_start,
            'end_periode' => $date->date_end,
            'make_by' => auth()->user()->name,
        ]);

        $savedReport->save();

        return $mergedData;
    }

    /**
     * Define the headings for the Excel file.
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            ['DATA REKAPITULASI SANTRI KSPPS BMT NU NGASEM'], // Title row
            [
                'Nama Santri',
                'Kantor',
                'Jabatan',
                'Total Hari',
                'Hari Aktif',
                'Kedisiplinan',
                '',
                'Karakter',
                '',
                '',
                '',
                'Kinerja dan Kehadiran',
                '',
                '',
                '',
                'Izin',
                'Cuti',
                'Skor',
            ],
            [
                '', // Empty for merged cells
                '', // Empty for merged cells
                '', // Empty for merged cells
                '1 Bulan', // Empty for merged cells
                'Hari Aktif', // Empty for merged cells
                'Datang Pulang',
                '%',
                'Tilawah',
                '%',
                'Tahajud',
                '%',
                'LKH',
                '%',
                'Kehadiran',
                '%',
                '',
                '',
                '',
            ],
        ];
    }

    /**
     * Apply styles to the sheet.
     *
     * @param Worksheet $sheet
     * @return void
     */
    public function styles(Worksheet $sheet)
    {
        // Title Row (Santri Performance)
        $sheet->mergeCells('A1:R1');
        $sheet->getStyle('A1')->applyFromArray([
            'font' => [
                'size' => 24,
                'bold' => true,
            ],
            'alignment' => [
                'horizontal' => 'center',
                'vertical' => 'center',
            ],
            'fill' => [
                'fillType' => 'solid',
                'startColor' => ['argb' => 'FCA503'], // Blue
            ],
        ]);

        // Second Row Headers
        $sheet->mergeCells('A2:A3');
        $sheet->mergeCells('B2:B3');
        $sheet->mergeCells('C2:C3');
        $sheet->mergeCells('D2:E2'); // Merge for "Kedisiplinan"
        $sheet->mergeCells('F2:G2'); // Merge for "Karakter"
        $sheet->mergeCells('H2:K2'); // Merge for "Kinerja dan Kehadiran"
        $sheet->mergeCells('L2:O2'); // Merge for "Kinerja dan Kehadiran"
        $sheet->mergeCells('H2:K2'); // Merge for "Kinerja dan Kehadiran"
        
        $sheet->mergeCells('P2:P3'); // Merge for "Kinerja dan Kehadiran"
        $sheet->mergeCells('Q2:Q3'); // Merge for "Kinerja dan Kehadiran"
        $sheet->mergeCells('R2:R3'); // Merge for "Kinerja dan Kehadiran"

        // Add colors to merged headers
        $sheet->getStyle('D2:E2')->applyFromArray([
            'fill' => [
                'fillType' => 'solid',
                'startColor' => ['argb' => 'FFFF00'], // Yellow
            ],
            'font' => ['bold' => true],
            'alignment' => ['horizontal' => 'center'],
        ]);
        $sheet->getStyle('F2:I2')->applyFromArray([
            'fill' => [
                'fillType' => 'solid',
                'startColor' => ['argb' => '00FF00'], // Green
            ],
            'font' => ['bold' => true],
            'alignment' => ['horizontal' => 'center'],
        ]);
        $sheet->getStyle('J2:M2')->applyFromArray([
            'fill' => [
                'fillType' => 'solid',
                'startColor' => ['argb' => 'FCA503'], // Blue
            ],
            'font' => ['bold' => true],
            'alignment' => ['horizontal' => 'center'],
        ]);

        // General styling for all headers
        $sheet->getStyle('A2:R3')->applyFromArray([
            'font' => [
                'bold' => true,
            ],
            'alignment' => [
                'horizontal' => 'center',
                'vertical' => 'center',
            ],
        ]);

        return $sheet;
    }
}