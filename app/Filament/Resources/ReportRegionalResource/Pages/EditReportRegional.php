<?php

namespace App\Filament\Resources\ReportRegionalResource\Pages;

use App\Filament\Resources\ReportRegionalResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditReportRegional extends EditRecord
{
    protected static string $resource = ReportRegionalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
