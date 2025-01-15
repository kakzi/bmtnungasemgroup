<?php

namespace App\Filament\Resources\MurabahahResource\Pages;

use App\Filament\Resources\MurabahahResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMurabahah extends EditRecord
{
    protected static string $resource = MurabahahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
