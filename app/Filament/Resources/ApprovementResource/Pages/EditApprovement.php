<?php

namespace App\Filament\Resources\ApprovementResource\Pages;

use App\Filament\Resources\ApprovementResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditApprovement extends EditRecord
{
    protected static string $resource = ApprovementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
