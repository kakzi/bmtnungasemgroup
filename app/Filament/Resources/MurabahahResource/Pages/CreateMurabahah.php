<?php

namespace App\Filament\Resources\MurabahahResource\Pages;

use Filament\Actions;
use App\Models\Approvement;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\MurabahahResource;

class CreateMurabahah extends CreateRecord
{
    protected static string $resource = MurabahahResource::class;
    protected function afterCreate(): void
    {
        // Runs after the form fields are saved to the database.
        $data = $this->record;
        if (isset($data['permohonan_id'])) {

            //  $permohonan->update(['status_permohonan' => 'waiting_for_approval']);
            //  insert to approvement table
        
            Approvement::where('permohonan_id', $data['permohonan_id'])
                ->update(['agreement' => 'printed', 'nominal_pencairan' => $data['total_mrbh']]);
            
        }
    }
}
