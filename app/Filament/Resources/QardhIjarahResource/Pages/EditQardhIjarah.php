<?php

namespace App\Filament\Resources\QardhIjarahResource\Pages;

use App\Filament\Resources\QardhIjarahResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditQardhIjarah extends EditRecord
{
    protected static string $resource = QardhIjarahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
