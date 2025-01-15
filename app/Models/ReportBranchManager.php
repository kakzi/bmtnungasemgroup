<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReportBranchManager extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'office_id',
        'kas',
        'penempatan_kantor',
        'simpanan',
        'deposito',
        'simpanan_khusus',
        'pembiayaan',
        'kafalah',
        'qardh',
        'aset',
        'omset',
        'shu',
        'update_bantuan',
        'checklist_teller',
        'checklist_marketing',

        'briefing',
        'attribute',
        'penagihan',
        'lancar',
        'dpk',
        'kuranglancar',
        'diragukan',
        'macet',

        'pendampingan',
        'file_foto_penagihan',
        'file_pendampingan',
        'file_akad',
        'file_ttd_akad',
        'file_cek_fisik_brankas',
        'file_dokumentasi_briefing',
        'file_notulensi',
        'file_tabarru_nota',
        'file_kebersihan',
        'update_media',
        'file_update_medsos',
        'catatan_khusus',

        'check_rm',
        'check_s',
        'check_m',
        'check_as',
        'check_dir',
        'make_by',
    ];

    protected $casts = [
        'checklist_teller' => 'array',
        'checklist_marketing' => 'array',
        'file_cek_fisik_brankas' => 'array',
        'file_akad' => 'array',
        'file_ttd_akad' => 'array',
    ];

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
