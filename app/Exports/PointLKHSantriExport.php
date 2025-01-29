<?php

namespace App\Exports;

use App\Models\User;
use App\Models\SyncDate;
use App\Models\PointLkhSantri;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Events\AfterSheet;

class PointLKHSantriExport implements FromCollection, WithHeadings, WithEvents, WithStyles, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $date = SyncDate::first();
        return User::select('users.id', 'users.name')
            ->selectRaw('COALESCE(SUM(point_lkh_santris.point_lkh), 0) AS total_points_lkh') // Sum the point_lkh
            ->selectRaw('COALESCE(SUM(point_lkh_santris.point_kehadiran), 0) AS total_points_kehadiran') // Sum the point_kehadiran
            ->leftJoin('point_lkh_santris', 'users.id', '=', 'point_lkh_santris.user_id')
            ->groupBy('users.id', 'users.name')
            ->where(function ($query) use ($date) {
                // Check the date range or if the record is missing
                $query->whereBetween('point_lkh_santris.created_at', [$date->date_start, $date->date_end])
                    ->orWhereNull('point_lkh_santris.created_at');
            })
            ->orderBy('users.name', 'asc') // Sort by user name in ascending order
            ->get()
            ->map(function ($user) use ($date) {
                $officeName = User::where('id', $user->id)->first()->office;

                return [
                    'Nama Santri' => $user->name,
                    'Jabatan' => $user->roles->pluck('name')->implode(', '),
                    'Kantor Cabang' => $officeName->name ?? 'Unknown',
                    'Total Hari' => $date->total_day,
                    'Hari Aktif' => $date->active_day,
                    'LKH' => $user->total_points_lkh,
                    '% LKH' => $date->active_day > 0 
                        ? round(($user->total_points_lkh / $date->active_day) * 100, 2) . '%' 
                        : '0%',
                    'Kehadiran' => $user->total_points_kehadiran,
                    '% Kehadiran' => $date->active_day > 0 
                        ? round(($user->total_points_kehadiran / $date->active_day) * 100, 2) . '%' 
                        : '0%',
                ];
            });
    }

    public function headings(): array
    {
        return [
            ['Santri Performance'], // Title row
            [ // Second row: Merged Header for Kehadiran
                'Nama Santri', 
                'Jabatan', 
                'Kantor Cabang', 
                'KEHADIRAN', '', '', '', '', // Placeholder columns for merged section
            ],
            [ // Third row: Sub-headings under Kehadiran
                'Nama Santri', 
                'Jabatan', 
                'Kantor Cabang', 
                'Total Hari', 
                'Hari Aktif', 
                'LKH', 
                '% LKH', 
                'Kehadiran', 
                '% Kehadiran'
            ],
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Title row style
            1 => [
                'font' => [
                    'bold' => true,
                    'size' => 16,
                    'color' => ['argb' => 'FFFFFFFF'], // White text
                ],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => ['argb' => 'FF4CAF50'], // Green background
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                ],
            ],
            // Second row (KEHADIRAN merged cell)
            2 => [
                'font' => [
                    'bold' => true,
                    'color' => ['argb' => 'FFFFFFFF'], // White text
                ],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => ['argb' => 'FF2196F3'], // Blue background
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                ],
            ],
            // Third row (Sub-headings)
            3 => [
                'font' => [
                    'bold' => true,
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                ],
            ],
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet;

                // Merge cells for the title row
                $sheet->mergeCells('A1:I1');

                // Merge cells for "KEHADIRAN"
                $sheet->mergeCells('D2:I2'); // Spans across Total Hari to % Kehadiran

                // Adjust column widths (optional)
                $sheet->getColumnDimension('A')->setWidth(20);
                $sheet->getColumnDimension('B')->setWidth(20);
                $sheet->getColumnDimension('C')->setWidth(25);
                $sheet->getColumnDimension('D')->setWidth(15);
                $sheet->getColumnDimension('E')->setWidth(15);
                $sheet->getColumnDimension('F')->setWidth(10);
                $sheet->getColumnDimension('G')->setWidth(10);
                $sheet->getColumnDimension('H')->setWidth(10);
                $sheet->getColumnDimension('I')->setWidth(10);
            },
        ];
    }

}
