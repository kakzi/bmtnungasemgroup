<?php

namespace App\Filament\Resources\PermissionCutiResource\Pages;

use App\Filament\Resources\PermissionCutiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPermissionCutis extends ListRecords
{
    protected static string $resource = PermissionCutiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
