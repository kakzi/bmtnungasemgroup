<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agreement extends Model
{
    use HasFactory;

    protected $fillable = [
        'office_id',
        'approvement_id',
        'permohonan_id',
        'nomor_agreement',
        'akad',
        'petugas_akad',
        'saksi_akad',
        'kantor_akad',

        //fill murabahah dan murabahah dp
        'jenis_barang',
        'merk',
        'nomor',
        'tahun',
        'rangka',
        'mesin',
        'warna',

        'harga_beli',
        'angsuran',
        'dp_mrbh',
        'up_mrbh',
        'harga_jual',
        'total_mrbh',
        'pokok_mrbh',
        'ujroh_mrbh',
        'total_angsuran_mrbh',

        //fill selain murabahah dan murabahah dp

        'nominal_qard',
        'p_angsuran',
        'jangka_waktu',
        'ujroh',
        'qard_pokok',
        'qard_ujroh',
        'angsuran_qard',
        'total_pokok',
        'total_ujroh',
        'total_angsuran',

        
        'sim_wajib',
        'atk',
        'materai',
        'wakaf',
        'tabarru',
        'total_biaya_akad',
        'tempo_awal',
        'tempo_akhir',

        //Valiadate file
        'file_agreement',
        'file_foto_akad',
        'check_bm',
        'check_rm',
        'check_staff',
        'check_manager',
        'check_asdir',
        'check_dir',

        //make_by
        'make_by'

    ];

    public function permohonan() {
        return $this->belongsTo(Permohonan::class, 'permohonan_id');
    }
}
