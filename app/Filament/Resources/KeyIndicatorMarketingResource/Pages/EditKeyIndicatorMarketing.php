<?php

namespace App\Filament\Resources\KeyIndicatorMarketingResource\Pages;

use App\Filament\Resources\KeyIndicatorMarketingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKeyIndicatorMarketing extends EditRecord
{
    protected static string $resource = KeyIndicatorMarketingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
