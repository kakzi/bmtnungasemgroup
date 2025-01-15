<?php

namespace App\Filament\Resources\AngsuranMurabahahResource\Pages;

use App\Filament\Resources\AngsuranMurabahahResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAngsuranMurabahahs extends ListRecords
{
    protected static string $resource = AngsuranMurabahahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
