<?php

namespace App\Filament\Resources\ReportRegionalResource\Pages;

use Filament\Actions;
use App\Models\PointLkhSantri;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\ReportRegionalResource;

class CreateReportRegional extends CreateRecord
{
    protected static string $resource = ReportRegionalResource::class;

    protected function afterCreate(): void
    {
        PointLkhSantri::create([
            'user_id' => auth()->user()->id,
            'point_lkh' => 1,
            'point_kehadiran' => 1
        ]);
    }
}
