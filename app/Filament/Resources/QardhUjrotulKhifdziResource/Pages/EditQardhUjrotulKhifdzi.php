<?php

namespace App\Filament\Resources\QardhUjrotulKhifdziResource\Pages;

use App\Filament\Resources\QardhUjrotulKhifdziResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditQardhUjrotulKhifdzi extends EditRecord
{
    protected static string $resource = QardhUjrotulKhifdziResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
