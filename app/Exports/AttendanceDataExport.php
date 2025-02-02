<?php

namespace App\Exports;
namespace App\Exports;


use App\Models\Attendance;
use App\Models\SyncDate;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Style;
use PhpOffice\PhpSpreadsheet\Style\Color;
use Maatwebsite\Excel\Concerns\WithDefaultStyles;

class AttendanceDataExport implements FromQuery, WithMapping, WithHeadings, WithStyles
{
    
    use Exportable;

    // public function forRange(String $start_date, String $end_date)
    // {
    //     $this->start = $start_date;
    //     $this->end = $end_date;

    //     return $this;
    // }

    public function query()
    {
        $date = SyncDate::first();
        return Attendance::query()->with('user.roles', 'detail', 'office')->whereBetween('date_absensi', [$date->date_start, $date->date_end]);
    }

    /**
     * @var Transaction $transaction
     */
    public function map($attendance): array
    {
        $roles = $attendance->user->roles->pluck('name')->implode(', ');
        return [
            // $i++,
            $attendance->user->name,
            $roles,
            $attendance->office->name,
            Carbon::parse($attendance->date_absensi)->format('d-m-Y'),
            "Absensi Harian",
            "06:02",
            "15:00",
            $attendance->detail[0]->pukul,
            $attendance->detail[0]->keterangan,
            $attendance->detail[0]->lat.",".$attendance->detail[0]->long,
            $attendance->detail[0]->address,
            $attendance->detail[0]->distance,
            count($attendance->detail) == 1 ? "-" : $attendance->detail[1]->pukul,
            count($attendance->detail) == 1 ? "-" : $attendance->detail[1]->keterangan,
            count($attendance->detail) == 1 ? "-" : $attendance->detail[1]->lat.",".$attendance->detail[1]->long,
            count($attendance->detail) == 1 ? "-" : $attendance->detail[1]->address,
            count($attendance->detail) == 1 ? "-" : $attendance->detail[1]->distance,
            $attendance->detail[0]->point,
            count($attendance->detail) == 1 ? 0 : $attendance->detail[1]->point,
            count($attendance->detail) == 1 ? $attendance->detail[0]->point : $attendance->detail[0]->point + $attendance->detail[1]->point,

        ];
    }

    public function headings(): array
    {
        return [
            // 'No',
            'Nama Santri',
            'Jabatan',
            'Kantor',
            'Tanggal',
            'Shift Name',
            'Shift In',
            'Shift Out',
            'Actual In',
            'Note In',
            'GeoLocation In',
            'Address In',
            'Distance In',
            'Actual Out',
            'Note Out',
            'GeoLocation Out',
            'Address Out',
            'Distance Out',
            'Point In',
            'Point Out',
            'Total Point',
        ];
    }
    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true],['size' => 12]],
        ];
    }
}