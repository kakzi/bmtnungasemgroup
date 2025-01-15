<?php

namespace App\Filament\Resources\PermissionIzinResource\Pages;

use App\Filament\Resources\PermissionIzinResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPermissionIzin extends EditRecord
{
    protected static string $resource = PermissionIzinResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
