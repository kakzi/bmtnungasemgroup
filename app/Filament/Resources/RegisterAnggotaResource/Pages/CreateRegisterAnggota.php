<?php

namespace App\Filament\Resources\RegisterAnggotaResource\Pages;

use App\Filament\Resources\RegisterAnggotaResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateRegisterAnggota extends CreateRecord
{
    protected static string $resource = RegisterAnggotaResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
