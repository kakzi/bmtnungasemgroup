<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agunan extends Model
{
    use HasFactory;


    protected $fillable = [
        'permohonan_id',
        'office_id',
        'type_agunan',
        'atas_nama',
        'status_agunan',
        'nomor_agunan',
        'luas',
        'bank',
        'merk',
        'tahun',
        'nopol',
        'nomor_rangka',
        'warna',
        'produced_by',
        'nilai_taksir',
        'alamat_agunan',
    ];

    public function permohonan(){
        return $this->belongsTo(Permohonan::class);
    }
    public function office(){
        return $this->belongsTo(Office::class);
    }
}
