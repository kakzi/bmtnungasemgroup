<?php

namespace App\Filament\Resources\QardhUjrotulBilAmalResource\Pages;

use App\Filament\Resources\QardhUjrotulBilAmalResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListQardhUjrotulBilAmals extends ListRecords
{
    protected static string $resource = QardhUjrotulBilAmalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
