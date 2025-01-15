<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReportTeller extends Model
{
    use HasFactory;

    protected $fillable = [
        'office_id',
        'user_id',
        'kas_khasanah',
        'uang_real',
        'pagu_kas',
        'modal_teller',
        'simpanan',
        'deposit',
        'angsuran',
        'atk',
        'materai',
        'kas_masuk',
        'total_masuk',
        'penarikan',
        'pencairan_pembiayaan',
        'kas_keluar',
        'penc_deposito',
        'total_keluar',
        'total',
        'prospek',
        'update_media',
        'update_jaminan',
        'layanan',
        'p_pembiayaan',
        'p_simpanan',
        'anggota_b_simpanan',
        'anggota_b_pembiayaan',
        'aplikasiwa',
        'jumlah_slip',
        'jumlah_a_pencairan',
        'jumlah_visit',
        'file_slip_penarikan',
        'file_kas_keluar',
        'file_kas_opname',
        'file_portofolio',
        'file_foto_promo',
        'file_bp_st_agunan',
        'file_s_brankas',
        'file_simpok',
        'file_d_anggota',
        'file_mutasi',
        'file_buku_serah_terima',
        'file_update_medsos',
        'file_data_simjakasya',
        'check_bm',
        'check_rm',
        'check_s',
        'check_m',
        'check_as',
        'check_dir',
        'make_by',
    ];

    // 'layanan',
    // 'p_pembiayaan',
    // 'p_simpanan',

    protected $casts = [
        'layanan' => 'array',
        'p_pembiayaan' => 'array',
        'p_simpanan' => 'array',
        'file_slip_penarikan' => 'array',
    ];

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
