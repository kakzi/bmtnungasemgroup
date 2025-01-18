<?php

namespace App\Exports;

use App\Models\Attendance;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AttendanceExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        // Fetch attendance data and sum points by user
        return Attendance::select('user_id')
            ->selectRaw('SUM(detail.point) AS total_points')
            ->join('attendance_details as detail', 'attendances.id', '=', 'detail.attendance_id')
            ->groupBy('user_id')
            ->with('user.roles', 'office') // Eager load the user relationship
            ->get()
            ->map(function ($attendance) {
                return [
                    'Nama Santri' => $attendance->user->name, // Access user name
                    'Jabatan' => $attendance->user->roles->pluck('name')->implode(', '), // Access user name
                    'Kantor Cabang' => $attendance->office->name,
                    'Total Poin' => $attendance->total_points,
                ];
            });
    }

    public function headings(): array
    {
        return [
            'Nama Santri',
            'Jabatan',
            'Kantor Cabang',
            'Total Poin',
        ];
    }
}
