<?php

namespace App\Filament\Resources\MusyarakahResource\Pages;

use App\Filament\Resources\MusyarakahResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMusyarakah extends EditRecord
{
    protected static string $resource = MusyarakahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
