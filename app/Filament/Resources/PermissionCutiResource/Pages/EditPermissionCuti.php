<?php

namespace App\Filament\Resources\PermissionCutiResource\Pages;

use App\Filament\Resources\PermissionCutiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPermissionCuti extends EditRecord
{
    protected static string $resource = PermissionCutiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
