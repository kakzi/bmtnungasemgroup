<?php

namespace App\Filament\Resources\ReportBranchManagerResource\Pages;

use Filament\Actions;
use App\Models\PointLkhSantri;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\ReportBranchManagerResource;
use Carbon\Carbon;

class CreateReportBranchManager extends CreateRecord
{
    protected static string $resource = ReportBranchManagerResource::class;
    protected function afterCreate(): void
    {

        PointLkhSantri::create([
            'user_id' => auth()->user()->id,
            'point_lkh' => 1,
            'point_kehadiran' => 1,
            'date_lkh' => Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s')
        ]);
    }
}
