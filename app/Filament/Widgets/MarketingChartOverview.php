<?php

namespace App\Filament\Widgets;

use App\Models\ReportMarketing;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;
use Filament\Widgets\Concerns\InteractsWithPageFilters;

class MarketingChartOverview extends ChartWidget
{

    use InteractsWithPageFilters;

    protected static ?string $heading = 'Progres Funding Marketing';
    protected static ?int $sort = 1;
    protected static ?string $maxHeight = '450px';
    

    protected function getData(): array
    {
        $marketingId = $this->filters['marketing'] ?? auth()->user()->id; // Get filter value if available

        // Fetch funding data for the last 7 days
        $reports = ReportMarketing::where('user_id', $marketingId)
            ->whereDate('created_at', '>=', now()->subDays(7))
            ->selectRaw('DATE(created_at) as date, SUM(funding) as total_funding')
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

        // Prepare chart data
        $labels = [];
        $fundingData = [];

        foreach ($reports as $report) {
            $labels[] = Carbon::parse($report->date)->isoFormat('dddd DD MMM YYYY');  // Store the date as label
            $fundingData[] = (float) $report->total_funding; // Convert funding to float for chart
        }

        return [
            'datasets' => [
                [
                    'label' => 'Total Funding (Rp)',
                    'data' => $fundingData,
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
        return 'line';
    }
}
