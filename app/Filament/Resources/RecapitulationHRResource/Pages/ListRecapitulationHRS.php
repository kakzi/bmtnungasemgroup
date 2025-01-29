<?php

namespace App\Filament\Resources\RecapitulationHRResource\Pages;

use App\Filament\Resources\RecapitulationHRResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRecapitulationHRS extends ListRecords
{
    protected static string $resource = RecapitulationHRResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
