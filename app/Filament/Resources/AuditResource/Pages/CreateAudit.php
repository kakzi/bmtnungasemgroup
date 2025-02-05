<?php

namespace App\Filament\Resources\AuditResource\Pages;

use App\Models\Audit;
use Filament\Actions;
use App\Models\CheckBrankas;
use App\Models\SelfiBrankas;
use App\Models\CheckFisikUang;
use App\Models\CheckFisikJaminan;
use App\Filament\Resources\AuditResource;
use Filament\Resources\Pages\CreateRecord;

class CreateAudit extends CreateRecord
{
    protected static string $resource = AuditResource::class;

    protected function afterCreate(): void
    {
        // Runs after the form fields are saved to the database.
        $grade = "";
        $data = $this->record;
        $cfuPoint = CheckFisikUang::where('audit_id', $data['id'])->get();
        $cfjPoint = CheckFisikJaminan::where('audit_id', $data['id'])->get();
        $cfSbPoint = SelfiBrankas::where('audit_id', $data['id'])->get();
        $cfCbPoint = CheckBrankas::where('audit_id', $data['id'])->get();
        $totalPoint = $cfuPoint->sum('point') + $cfjPoint->sum('point') + $cfSbPoint->sum('point') + $cfCbPoint->sum('point');
        // dd($totalPoint);

        if ($totalPoint >= 90 && $totalPoint <= 100) {
            $grade = "Grade A";
        } elseif ($totalPoint >= 80 && $totalPoint < 90) {
            $grade = "Grade B";
        } elseif ($totalPoint >= 70 && $totalPoint < 80) {
            $grade = "Grade C";
        } elseif ($totalPoint >= 60 && $totalPoint < 70) {
            $grade = "Grade D";
        } else {
            $grade = "Grade E"; // Tambahan jika nilai di bawah 60
        }
        
        // Update nilai total_point dan grade ke database
        Audit::where('id', $data['id'])->update(['total_point' => $totalPoint, 'grade' => $grade]);
        
    }
}
