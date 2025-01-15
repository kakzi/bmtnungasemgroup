<?php

namespace App\Filament\Resources\SurveyorResource\Pages;

use App\Filament\Resources\SurveyorResource;
use App\Models\Approvement;
use App\Models\Permohonan;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSurveyor extends CreateRecord
{
    protected static string $resource = SurveyorResource::class;

    protected function afterCreate(): void
    {
        // Runs after the form fields are saved to the database.
        $data = $this->record;
        if (isset($data['permohonan_id'])) {

            // $permohonan->update(['status_permohonan' => 'waiting_for_approval']);
            //insert to approvement table
            Approvement::create([
                'permohonan_id' => $data['permohonan_id'],
                'office_id' => $data['office_id'],
                'surveyor_id' => $data['id']
            ]);
            
            Permohonan::where('id', $data['permohonan_id'])
            ->update(['status_permohonan' => 'waiting_for_approval']);
            
        }
    }
}
