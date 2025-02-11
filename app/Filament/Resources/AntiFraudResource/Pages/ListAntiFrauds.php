<?php

namespace App\Filament\Resources\AntiFraudResource\Pages;

use App\Filament\Resources\AntiFraudResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAntiFrauds extends ListRecords
{
    protected static string $resource = AntiFraudResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
