<?php

namespace App\Filament\Resources\MusyarakahResource\Pages;

use App\Filament\Resources\MusyarakahResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMusyarakahs extends ListRecords
{
    protected static string $resource = MusyarakahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
