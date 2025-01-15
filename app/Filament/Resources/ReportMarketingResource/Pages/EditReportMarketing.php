<?php

namespace App\Filament\Resources\ReportMarketingResource\Pages;

use App\Filament\Resources\ReportMarketingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditReportMarketing extends EditRecord
{
    protected static string $resource = ReportMarketingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
