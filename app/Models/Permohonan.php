<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permohonan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomor_permohonan',
        'office_id',
        'register_anggota_id',
        'periode_angsuran_id',
        'jenis_pembiayaan_id',
        'jumlah_permohonan',
        'lama_angsuran',
        'keperluan',
        'permohonan_ke',
        'status_rumah',
        'alamat_usaha',
        'nama_ahli_waris',
        'status_ahli_waris',
        'pekerjaan_ahli_waris',
        'nik_ahli_waris',
        'tempat_ahli_waris',
        'jenis_kelamin_ahli_waris',
        'tanggal_ahli_waris',
        'umur_ahli_waris',
        'alamat_ahli_waris',
        'istri',
        'anak',
        'orang_tua',
        'other',
        'file_permohonan',
        'berkas',
        'make_by',
    ];

    protected $casts = [
        'berkas' => 'array',
    ];

    public function agunan(){
        return $this->hasMany(Agunan::class);
    }
    
    public function anggota() {
        return $this->belongsTo(RegisterAnggota::class, 'register_anggota_id');
    }
    public function pembiayaan() {
        return $this->belongsTo(JenisPembiayaan::class, 'jenis_pembiayaan_id');
    }
    public function angsuran() {
        return $this->belongsTo(PeriodeAngsuran::class, 'periode_angsuran_id');
    }
    public function office(): BelongsTo
    {
        return $this->belongsTo(Office::class, 'office_id');
    }


}
