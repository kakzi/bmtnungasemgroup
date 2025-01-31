<?php

namespace App\Filament\Widgets;

use App\Models\RegisterAnggota;
use App\Models\ReportMarketing;
use App\Models\User;
use Filament\Pages\Auth\Register;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class MarketingOverview extends BaseWidget
{
    protected static ?int $sort = 1;
    use InteractsWithPageFilters;

    protected static ?string $pollingInterval = '20s';
    protected function getStats(): array
    {

        $filters = $this->filters;
        $marketingId = $filters['marketing'] ?? null;
        // Fetch last 7 days funding data
        $fundingStats = ReportMarketing::where('user_id', $marketingId)->whereDate('created_at', '>=', now()->subDays(7))
            ->selectRaw('DATE(created_at) as date, SUM(funding) as total_funding')
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();
    
        // Extract funding values for the chart
        $chartData = [];
        foreach ($fundingStats as $stat) {
            $chartData[] = (float) $stat->total_funding; // Ensure numeric values
        }
    
        // Calculate total funding for the last 7 days
        $totalFunding = $fundingStats->sum('total_funding');

         // Fetch last 7 days funding data
        $landingStats = ReportMarketing::where('user_id', $marketingId)->whereDate('created_at', '>=', now()->subDays(7))
            ->selectRaw('DATE(created_at) as date, SUM(landing) as total_landing')
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();
    
        // Extract landing values for the chart
        $chartDataLanding = [];
        foreach ($landingStats as $stat) {
            $chartDataLanding[] = (float) $stat->total_landing; // Ensure numeric values
        }
    
        // Calculate total landing for the last 7 days
        $totallanding = $landingStats->sum('total_landing');
    
        $user = User::where('id', $marketingId)->first();
        $totalanggota = RegisterAnggota::where('make_by', $user->name)->count();
    
        return [
            Stat::make('Total Funding (7 Hari Terakhir)', 'Rp ' . number_format($totalFunding, 0, ',', '.'))
                ->description('Progress dalam 1 Minggu Terakhir')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart($chartData) // Dynamic funding data for the last 7 days
                ->color('success'),
            Stat::make('Total Landing (7 Hari Terakhir)', 'Rp ' . number_format($totallanding, 0, ',', '.'))
                ->description('Progress dalam 1 Minggu Terakhir')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart($chartDataLanding) // Dynamic funding data for the last 7 days
                ->color('info'),
            Stat::make('Total Anggota', $totalanggota . ' Anggota')
                ->description('Progress dalam 1 Minggu Terakhir')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                // ->chart($chartDataLanding) // Dynamic funding data for the last 7 days
                ->color('warning'),
        ];
    }
}
