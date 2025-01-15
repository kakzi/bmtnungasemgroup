<?php

namespace App\Filament\Resources\MurabahahDPResource\Pages;

use App\Filament\Resources\MurabahahDPResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMurabahahDP extends EditRecord
{
    protected static string $resource = MurabahahDPResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
