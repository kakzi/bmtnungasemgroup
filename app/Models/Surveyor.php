<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Surveyor extends Model
{
    use HasFactory;

    protected $fillable = [
        'office_id',
        'permohonan_id',
        'nik',
        'status_berkas',
        'kemampuan_bayar',
        'nominal_approval',
        'recommendation',
        'note',
        'dokumentasi',
        'file_history',
        'file_dokumentasi',
        'file_surveyor',
        'make_by',
    ];

    protected $casts = [
        'dokumentasi' => 'array',
    ];
    public function permohonan(): BelongsTo
    {
        return $this->belongsTo(Permohonan::class, 'permohonan_id');
    }
}
