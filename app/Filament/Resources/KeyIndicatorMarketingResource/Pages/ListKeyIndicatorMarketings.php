<?php

namespace App\Filament\Resources\KeyIndicatorMarketingResource\Pages;

use App\Filament\Resources\KeyIndicatorMarketingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKeyIndicatorMarketings extends ListRecords
{
    protected static string $resource = KeyIndicatorMarketingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
