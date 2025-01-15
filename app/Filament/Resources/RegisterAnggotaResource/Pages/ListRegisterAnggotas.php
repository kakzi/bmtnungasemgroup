<?php

namespace App\Filament\Resources\RegisterAnggotaResource\Pages;

use App\Filament\Resources\RegisterAnggotaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRegisterAnggotas extends ListRecords
{
    protected static string $resource = RegisterAnggotaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
