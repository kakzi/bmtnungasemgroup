<?php

namespace App\Filament\Resources\SyncDateResource\Pages;

use App\Filament\Resources\SyncDateResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSyncDate extends EditRecord
{
    protected static string $resource = SyncDateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
