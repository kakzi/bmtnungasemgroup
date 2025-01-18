<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class FundingMarketingChart extends ChartWidget
{
    protected static ?string $heading = 'Progress Funding Marketing';

    protected function getData(): array
    {
        return [
            //
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
