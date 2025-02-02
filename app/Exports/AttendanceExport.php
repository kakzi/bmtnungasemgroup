<?php

namespace App\Exports;

use App\Models\Attendance;
use App\Models\Office;
use App\Models\SyncDate;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AttendanceExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        $date = SyncDate::first();
        return User::select('users.id', 'users.name')
            ->selectRaw('COALESCE(SUM(CASE WHEN detail.type = "in" THEN detail.point ELSE 0 END), 0) AS total_points_datang')
            ->selectRaw('COALESCE(SUM(CASE WHEN detail.type = "out" THEN detail.point ELSE 0 END), 0) AS total_points_pulang')
            ->leftJoin('attendances', 'users.id', '=', 'attendances.user_id')
            ->leftJoin('attendance_details as detail', 'attendances.id', '=', 'detail.attendance_id')
            ->where(function ($query) use ($date) {
                $query->whereBetween('attendances.date_absensi', [$date->date_start, $date->date_end])
                    ->orWhereNull('attendances.date_absensi'); // Include users without attendance records
            })
            ->groupBy('users.id', 'users.name')
            ->orderBy('users.name', 'asc') // Sort by 'Nama Santri' in ascending order
            ->get()
            ->map(function ($user) use ($date) {
                $officeName = User::where('id', $user->id)->first()->office; // Assuming office exists
                $totalPoint = $user->total_points_datang + $user->total_points_pulang;
                return [
                    'Nama Santri' => $user->name,
                    'Jabatan' => $user->roles->pluck('name')->implode(', '),
                    'Kantor Cabang' => $officeName->name ?? 'Unknown',
                    'Total Hari' => $date->total_day,
                    'Hari Aktif' => $date->active_day,
                    'Datang Pulang' => $user->total_points_datang + $user->total_points_pulang,
                    '%' => round(($totalPoint / $date->active_day) * 100, 2) . '%',
                ];
            });
    }
    

    public function headings(): array
    {
        return [
            'Nama Santri',
            'Jabatan',
            'Kantor Cabang',
            'Total Hari',
            'Hari Aktif',
            'Datang Pulang',
            '%'

        ];
    }
}
