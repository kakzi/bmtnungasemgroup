<?php

namespace App\Filament\Resources\KeyIndicatorBranchManagerResource\Pages;

use App\Filament\Resources\KeyIndicatorBranchManagerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKeyIndicatorBranchManagers extends ListRecords
{
    protected static string $resource = KeyIndicatorBranchManagerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
