<?php

namespace App\Filament\Resources\KarakterResource\Pages;

use App\Filament\Resources\KarakterResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKarakters extends ListRecords
{
    protected static string $resource = KarakterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
