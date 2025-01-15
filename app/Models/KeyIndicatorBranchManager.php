<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KeyIndicatorBranchManager extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        //KPI SATU
        'indicator_one',
        'kpi_one',
        'target_funding',
        'tercapai_funding',
        'kurang_funding',
        'nilai_one',
        'total_one',
        //KPI KEDUA
        'indicator_two',
        'kpi_two',
        'target_landing',
        'tercapai_landing',
        'kurang_landing',
        'nilai_two',
        'total_two',
        //KPI TIGA
        'indicator_three',
        'kpi_three',
        'target_npf',
        'tercapai_npf',
        'kurang_npf',
        'nilai_three',
        'total_three',
        //KPI EMPAT
        'indicator_four',
        'kpi_four',
        'target_omset',
        'tercapai_omset',
        'kurang_omset',
        'nilai_four',
        'total_four',
        //KPI LIMA
        'indicator_five',
        'kpi_five',
        'target_wakaf',
        'tercapai_wakaf',
        'kurang_wakaf',
        'nilai_five',
        'total_five',
        //KPI ENAM
        'indicator_six',
        'kpi_six',
        'target_jasa',
        'tercapai_jasa',
        'kurang_jasa',
        'nilai_six',
        'total_six',
        //KPI TUJUH
        'indicator_seven',
        'kpi_seven',
        'notes_seven',
        'nilai_seven',
        'total_seven',
        //KPI DELAPAN
        'indicator_eight',
        'kpi_eight',
        'notes_eight',
        'nilai_eight',
        'total_eight',
        //KPI SEMBILAN
        'indicator_nine',
        'kpi_nine',
        'notes_nine',
        'nilai_nine',
        'total_nine',
        
        //end
        'total_akhir',
        'description',
    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
