<?php

namespace App\Filament\Resources\RahnResource\Pages;

use App\Filament\Resources\RahnResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRahns extends ListRecords
{
    protected static string $resource = RahnResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
