<?php

namespace App\Filament\Resources\ReportTellerResource\Pages;

use App\Filament\Resources\ReportTellerResource;
use App\Models\PointLkhSantri;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateReportTeller extends CreateRecord
{
    protected static string $resource = ReportTellerResource::class;

    protected function afterCreate(): void
    {
        // Runs after the form fields are saved to the database.
        // $data = $this->record;
        // if (isset($data['permohonan_id'])) {

        //     // $permohonan->update(['status_permohonan' => 'waiting_for_approval']);
        //     //insert to approvement table
        //     Approvement::create([
        //         'permohonan_id' => $data['permohonan_id'],
        //         'office_id' => $data['office_id'],
        //         'surveyor_id' => $data['id']
        //     ]);
            
        //     Permohonan::where('id', $data['permohonan_id'])
        //     ->update(['status_permohonan' => 'waiting_for_approval']);
            
        // }

        PointLkhSantri::create([
            'user_id' => auth()->user()->id,
            'point_lkh' => 1,
            'point_kehadiran' => 1
        ]);
    }
}
