<?php

namespace App\Filament\Resources\SurveyorResource\Pages;

use App\Filament\Resources\SurveyorResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListSurveyors extends ListRecords
{
    protected static string $resource = SurveyorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getTableQuery(): ? Builder
    {
        return parent::getTableQuery()
            ->where('office_id', auth()->user()->office_id);
    }
}
