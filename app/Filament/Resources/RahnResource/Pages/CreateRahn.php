<?php

namespace App\Filament\Resources\RahnResource\Pages;

use Filament\Actions;
use App\Models\Approvement;
use App\Filament\Resources\RahnResource;
use Filament\Resources\Pages\CreateRecord;

class CreateRahn extends CreateRecord
{
    protected static string $resource = RahnResource::class;

    protected function afterCreate(): void
    {
        // Runs after the form fields are saved to the database.
        $data = $this->record;
        if (isset($data['permohonan_id'])) {

            //  $permohonan->update(['status_permohonan' => 'waiting_for_approval']);
            //  insert to approvement table
        
            Approvement::where('permohonan_id', $data['permohonan_id'])
                ->update(['agreement' => 'printed', 'nominal_pencairan' => $data['nominal_qard']]);
            
        }
    }
}
