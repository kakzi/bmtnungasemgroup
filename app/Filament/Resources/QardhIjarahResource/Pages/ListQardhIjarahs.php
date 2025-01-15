<?php

namespace App\Filament\Resources\QardhIjarahResource\Pages;

use App\Filament\Resources\QardhIjarahResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListQardhIjarahs extends ListRecords
{
    protected static string $resource = QardhIjarahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
