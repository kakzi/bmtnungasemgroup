<?php

namespace App\Filament\Resources\ReportTellerResource\Pages;

use App\Filament\Resources\ReportTellerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditReportTeller extends EditRecord
{
    protected static string $resource = ReportTellerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
