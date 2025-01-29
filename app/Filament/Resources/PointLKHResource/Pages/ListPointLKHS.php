<?php

namespace App\Filament\Resources\PointLKHResource\Pages;

use App\Filament\Resources\PointLKHResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPointLKHS extends ListRecords
{
    protected static string $resource = PointLKHResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
