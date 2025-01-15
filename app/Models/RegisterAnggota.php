<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RegisterAnggota extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'nik',
        'tempat_lahir',
        'tanggal_lahir',
        'age',
        'jenis_kelamin',
        'pekerjaan',
        'pendidikan',
        'agama',
        'kewarganegaraan',
        'alamat',
        'no_hp',
        'status',
        'foto',
        'lat_long',
        'make_by',
        'office_id',
        'province_id',     // Menambahkan kolom yang diizinkan
        'city_id',         // Menambahkan kolom yang diizinkan
        'district_id',     // Menambahkan kolom yang diizinkan
        'subdistrict_id',  // Menambahkan kolom yang diizinkan
        'postal_code',     // Menambahkan kolom yang diizinkan
    ];

    public function office(): BelongsTo
    {
        return $this->belongsTo(Office::class, 'office_id');
    }
    public function permohonan(): HasMany
    {
        return $this->hasMany(Permohonan::class, 'register_anggota_id');
    }
}
