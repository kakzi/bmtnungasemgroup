<?php

namespace App\Filament\Resources\MurabahahResource\Pages;

use App\Filament\Resources\MurabahahResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMurabahahs extends ListRecords
{
    protected static string $resource = MurabahahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
