<?php

namespace App\Filament\Widgets;

use Carbon\Carbon;
use App\Models\ReportMarketing;
use Filament\Widgets\ChartWidget;
use Filament\Widgets\Concerns\InteractsWithPageFilters;

class MarketingLandingChartOverview extends ChartWidget
{
    use InteractsWithPageFilters;

    protected static ?string $heading = 'Progres Landing Marketing';
    protected static ?int $sort = 2;
    protected static ?string $maxHeight = '450px';
    

    protected function getData(): array
    {
        $marketingId = $this->filters['marketing'] ?? null; // Get filter value if available

        // Fetch funding data for the last 7 days
        $reports = ReportMarketing::where('user_id', $marketingId)
            ->whereDate('created_at', '>=', now()->subDays(7))
            ->selectRaw('DATE(created_at) as date, SUM(landing) as total_landing')
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

        // Prepare chart data
        $labels = [];
        $landingData = [];

        foreach ($reports as $report) {
            $labels[] = Carbon::parse($report->date)->isoFormat('dddd DD MMM YYYY');  // Store the date as label
            $landingData[] = (float) $report->total_landing; // Convert landing to float for chart
        }

        return [
            'datasets' => [
                [
                    'label' => 'Total Landing (Rp)',
                    'data' => $landingData,
                    'fill' => 'start',
                    'borderColor' => '#008FFB',
                    'backgroundColor' => 'rgba(0,143,251,0.2)',
                ],
            ],
            'labels' => $labels, // Use actual date labels from database
        ];
    }
    protected function getType(): string
    {
        return 'bar';
    }
}
