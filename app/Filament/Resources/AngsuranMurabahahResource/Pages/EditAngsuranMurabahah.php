<?php

namespace App\Filament\Resources\AngsuranMurabahahResource\Pages;

use App\Filament\Resources\AngsuranMurabahahResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAngsuranMurabahah extends EditRecord
{
    protected static string $resource = AngsuranMurabahahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
