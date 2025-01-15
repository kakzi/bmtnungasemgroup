<?php

namespace App\Filament\Resources\ReportBranchManagerResource\Pages;

use App\Filament\Resources\ReportBranchManagerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListReportBranchManagers extends ListRecords
{
    protected static string $resource = ReportBranchManagerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
