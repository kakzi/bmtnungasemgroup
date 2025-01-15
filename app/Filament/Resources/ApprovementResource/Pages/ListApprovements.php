<?php

namespace App\Filament\Resources\ApprovementResource\Pages;

use App\Filament\Resources\ApprovementResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListApprovements extends ListRecords
{
    protected static string $resource = ApprovementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
