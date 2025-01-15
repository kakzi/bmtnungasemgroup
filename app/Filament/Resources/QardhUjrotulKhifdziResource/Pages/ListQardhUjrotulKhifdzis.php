<?php

namespace App\Filament\Resources\QardhUjrotulKhifdziResource\Pages;

use App\Filament\Resources\QardhUjrotulKhifdziResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListQardhUjrotulKhifdzis extends ListRecords
{
    protected static string $resource = QardhUjrotulKhifdziResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
