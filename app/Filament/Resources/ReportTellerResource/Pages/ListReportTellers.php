<?php

namespace App\Filament\Resources\ReportTellerResource\Pages;

use App\Filament\Resources\ReportTellerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListReportTellers extends ListRecords
{
    protected static string $resource = ReportTellerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
