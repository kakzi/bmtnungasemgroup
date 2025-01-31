<?php

namespace App\Filament\Widgets;

use App\Models\ReportMarketing;
use Filament\Widgets\ChartWidget;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

class FundingMarketingChart extends ApexChartWidget
{
    protected static ?string $heading = 'Progress Funding Marketing';
    protected static ?string $chartId = 'fundingMarketingBar';
    protected static ?string $pollingInterval = '5s';
    
    use InteractsWithPageFilters;

    protected function getOptions(): array
    {
        $filters = $this->filters;
        $marketingId = $filters['marketing'] ?? null;

        // Ambil data funding dalam 7 hari terakhir berdasarkan user_id yang dipilih
        $reports = ReportMarketing::where('user_id', $marketingId)
            ->whereDate('created_at', '>=', now()->subDays(14))
            ->selectRaw('DATE(created_at) as date, SUM(funding) as total_funding')
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

        // Siapkan label tanggal dan data funding
        $labels = [];
        $fundingData = [];

        foreach ($reports as $report) {
            $labels[] = \Carbon\Carbon::parse($report->date)->isoFormat('dddd D MMM YYYY');
            $fundingData[] = $report->total_funding;
        }

        return [
            'chart' => [
                'type' => 'bar',
                'height' => 450,
            ],
            'series' => [
                [
                    'name' => 'Total Funding', 
                    'data' => $fundingData,
                ],
            ],
            'xaxis' => [
                'categories' => $labels, // Label berdasarkan tanggal
                'labels' => [
                    'style' => [
                        'colors' => '#000',
                        'fontWeight' => 500,
                    ],
                ],
            ],
            'yaxis' => [
                'title' => [
                    'text' => 'Total Funding (IDR)', // Menampilkan satuan IDR
                    'style' => [
                        'color' => '#000',
                        'fontWeight' => 'regular',
                        'fontSize' => '12px',
                    ],
                ],
                'labels' => [
                    'style' => [
                        'colors' => '#000',
                        'fontWeight' => 500,
                    ],
                ],
            ],
            'colors' => ['#008FFB'], // Warna batang grafik
            'plotOptions' => [
                'bar' => [
                    'borderRadius' => 4,
                    'horizontal' => false, // Grafik vertikal
                ],
            ],
            'dataLabels' => [
                'enabled' => false,  
                'style' => [
                    'fontSize' => '12px',
                    'fontWeight' => 'medium',
                    'colors' => ['#FFFFFF'], 
                ],
                'position' => 'top',
            ],
        ];
    }

}
