<?php

namespace App\Filament\Resources\PermissionIzinResource\Pages;

use App\Filament\Resources\PermissionIzinResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPermissionIzins extends ListRecords
{
    protected static string $resource = PermissionIzinResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
