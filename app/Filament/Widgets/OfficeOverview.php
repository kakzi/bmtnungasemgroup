<?php

namespace App\Filament\Widgets;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class OfficeOverview extends BaseWidget
{
    protected static ?int $sort = 1;
    use InteractsWithPageFilters;


    protected static ?string $pollingInterval = '20s';

    protected function getStats(): array
    {
        $filters = $this->filters;
        $officeId = $filters['office'] ?? null; // Default office_id = 1 if not set
        $date = $filters['date'] ?? Carbon::today(); // Filter by today's date
        // Fetch summed values for each field
        $totals = DB::table('report_branch_managers')
            ->whereIn('office_id', $officeId)
            ->whereDate('created_at', $date)
            ->selectRaw('
                SUM(kas) as total_kas, 
                SUM(penempatan_kantor) as total_penempatan_kantor, 
                SUM(simpanan) as total_simpanan, 
                SUM(deposito) as total_deposito, 
                SUM(simpanan_khusus) as total_simpanan_khusus, 
                SUM(pembiayaan) as total_pembiayaan, 
                SUM(kafalah) as total_kafalah, 
                SUM(qardh) as total_qardh, 
                SUM(aset) as total_aset, 
                SUM(omset) as total_omset, 
                SUM(shu) as total_shu
            ')
            ->first();

        $numerator = $totals->total_kas + $totals->total_penempatan_kantor;
        $denominator = $totals->total_simpanan + $totals->total_deposito + $totals->total_simpanan_khusus;

        $kolektabilitas = ($denominator > 0) ? round(($numerator / $denominator) * 100, 2) : 0;


        return [
            Stat::make('Likuiditas', "{$kolektabilitas}%")
                ->description('Likuiditas hari ini')
                ->color('success'),

            Stat::make('Kas', 'Rp ' . number_format($totals->total_kas, 0, ',', '.'))
                ->description('Total Kas Hari Ini')
                ->color('success'),

            Stat::make('Aset', 'Rp ' . number_format($totals->total_aset, 0, ',', '.'))
                ->description('Total Aset Hari Ini')
                ->color('primary'),

            Stat::make('Omset', 'Rp ' . number_format($totals->total_omset, 0, ',', '.'))
                ->description('Total Omset Hari Ini')
                ->color('warning'),

            Stat::make('SHU', 'Rp ' . number_format($totals->total_shu, 0, ',', '.'))
                ->description('Total SHU Hari Ini')
                ->color('danger'),

            Stat::make('Penempatan Kantor', 'Rp ' . number_format($totals->total_penempatan_kantor, 0, ',', '.'))
                ->description('Total Penempatan Kantor Hari Ini')
                ->color('info'),

            Stat::make('Simpanan', 'Rp ' . number_format($totals->total_simpanan, 0, ',', '.'))
                ->description('Total Simpanan Hari Ini')
                ->color('primary'),

            Stat::make('Deposito', 'Rp ' . number_format($totals->total_deposito, 0, ',', '.'))
                ->description('Total Deposito Hari Ini')
                ->color('warning'),

            Stat::make('Simpanan Khusus', 'Rp ' . number_format($totals->total_simpanan_khusus, 0, ',', '.'))
                ->description('Total Simpanan Khusus Hari Ini')
                ->color('secondary'),

            Stat::make('Pembiayaan', 'Rp ' . number_format($totals->total_pembiayaan, 0, ',', '.'))
                ->description('Total Pembiayaan Hari Ini')
                ->color('danger'),

            Stat::make('Kafalah', 'Rp ' . number_format($totals->total_kafalah, 0, ',', '.'))
                ->description('Total Kafalah Hari Ini')
                ->color('info'),

            Stat::make('Qardh', 'Rp ' . number_format($totals->total_qardh, 0, ',', '.'))
                ->description('Total Qardh Hari Ini')
                ->color('success'),

            
        ];
    }
}
