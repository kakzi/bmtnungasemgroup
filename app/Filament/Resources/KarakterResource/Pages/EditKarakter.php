<?php

namespace App\Filament\Resources\KarakterResource\Pages;

use App\Filament\Resources\KarakterResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKarakter extends EditRecord
{
    protected static string $resource = KarakterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
