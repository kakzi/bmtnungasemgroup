<?php

namespace App\Filament\Resources\RecapitulationHRResource\Pages;

use App\Filament\Resources\RecapitulationHRResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRecapitulationHR extends EditRecord
{
    protected static string $resource = RecapitulationHRResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
