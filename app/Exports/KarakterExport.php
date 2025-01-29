<?php

namespace App\Exports;

use App\Models\User;
use App\Models\Karakter;
use App\Models\SyncDate;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class KarakterExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
    $date = SyncDate::first();
    return User::select('users.id', 'users.name')
        ->selectRaw('COALESCE(SUM(CASE WHEN karakter.type = "tilawah" THEN karakter.poin ELSE 0 END), 0) AS total_points_tilawah')
        ->selectRaw('COALESCE(SUM(CASE WHEN karakter.type = "tahajud" THEN karakter.poin ELSE 0 END), 0) AS total_points_tahajud')
        ->leftJoin('karakters as karakter', 'users.id', '=', 'karakter.user_id')
        ->where(function ($query) use ($date) {
            // Check the date range or if the record is missing
            $query->whereBetween('karakter.created_at', [$date->date_start, $date->date_end])
                ->orWhereNull('karakter.created_at');
        })
        ->groupBy('users.id', 'users.name')
        ->orderBy('users.name', 'asc') // Sort by user created_at in ascending order
        ->get()
        ->map(function ($user) use ($date) {
            $officeName = User::where('id', $user->id)->first()->office; // Assuming office exists

            return [
                'Nama Santri' => $user->name,
                'Jabatan' => $user->roles->pluck('name')->implode(', '),
                'Kantor Cabang' => $officeName->name ?? 'Unknown',
                'Total Hari' => $date->total_day,
                'Hari Aktif' => $date->active_day,
                'Tilawah' => $user->total_points_tilawah,
                '% Tilawah' => round(($user->total_points_tilawah / $date->total_day) * 100, 2) . '%',
                'Tahajud' => $user->total_points_tahajud,
                '% Tahajud' => round(($user->total_points_tahajud / $date->total_day) * 100, 2) . '%',
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
            'Tilawah',
            '%',
            'Tahajud',
            '%',
        ];
    }
}
