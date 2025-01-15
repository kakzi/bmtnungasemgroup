<?php

namespace App\Filament\Resources\RegisterAnggotaResource\Pages;

use App\Filament\Resources\RegisterAnggotaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRegisterAnggota extends EditRecord
{
    protected static string $resource = RegisterAnggotaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
