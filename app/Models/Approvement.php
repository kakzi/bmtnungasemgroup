<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Approvement extends Model
{
    use HasFactory;

    protected $fillable = [
        'surveyor_id',
        'office_id',
        'permohonan_id',
        'kep_asesor',
        'nominal_asesor',
        'nominal_pencairan',
        'agreement',
        'catatan_asesor',
        'make_by',
    ];

    public function permohonan() {
        return $this->belongsTo(Permohonan::class, 'permohonan_id');
    }
    public function surveyor(): BelongsTo
    {
        return $this->belongsTo(Surveyor::class, 'surveyor_id');
    }
    public function office(): BelongsTo
    {
        return $this->belongsTo(Office::class, 'office_id');
    }
}
