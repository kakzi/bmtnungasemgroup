<?php

namespace App\Filament\Resources\LettersResource\Pages;

use App\Filament\Resources\LettersResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLetters extends EditRecord
{
    protected static string $resource = LettersResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
