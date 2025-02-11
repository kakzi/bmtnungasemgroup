<?php

namespace App\Filament\Resources\AntiFraudResource\Pages;

use App\Filament\Resources\AntiFraudResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAntiFraud extends EditRecord
{
    protected static string $resource = AntiFraudResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
