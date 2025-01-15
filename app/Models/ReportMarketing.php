<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReportMarketing extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'office_id',
        'speedawal',
        'speedakhir',
        'modal',
        'anggota',
        'funding',
        'landing',
        'pendapatan',
        'nominal_npf',
        'jumlah_npf',
        'simpanan',
        'slip_simpanan',
        'penarikan',
        'slip_penarikan',
        'angsuran',
        'pokok',
        'ujroh',
        'slip_angsuran',

        'penagihan',
        'lancar',
        'dpk',
        'kuranglancar',
        'diragukan',
        'macet',

        'prospek',
        'layanan',
        'p_simpanan',
        'p_pembiayaan',
        'anggota_b_simpanan',
        'anggota_b_pembiayaan',
        'aplikasiwa',
        'jumlah_slip',
        'update_media',

        'file_slip_penarikan',
        'file_kas_opname',
        'file_foto_penawaran',
        'file_transaksi',
        'file_foto_penagihan',
        'file_form_modal',
        'file_medsos',
        'file_speedawal',
        'file_speedakhir',
        'make_by'
    ];

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
