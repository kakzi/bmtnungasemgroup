<?php

namespace App\Filament\Resources\LettersResource\Pages;

use App\Filament\Resources\LettersResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLetters extends ListRecords
{
    protected static string $resource = LettersResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
