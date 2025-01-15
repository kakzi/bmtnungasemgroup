<?php

namespace App\Filament\Resources\KeyIndicatorBranchManagerResource\Pages;

use App\Filament\Resources\KeyIndicatorBranchManagerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKeyIndicatorBranchManager extends EditRecord
{
    protected static string $resource = KeyIndicatorBranchManagerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
