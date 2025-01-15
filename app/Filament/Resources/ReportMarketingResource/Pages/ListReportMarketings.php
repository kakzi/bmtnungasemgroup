<?php

namespace App\Filament\Resources\ReportMarketingResource\Pages;

use App\Filament\Resources\ReportMarketingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListReportMarketings extends ListRecords
{
    protected static string $resource = ReportMarketingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
