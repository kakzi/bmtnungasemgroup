<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KeyIndicatorMarketing extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'indicator_one',
        'kpi_one',
        'target_funding',
        'tercapai_funding',
        'kurang_funding',
        'nilai_one',
        'total_one',
        'indicator_two',
        'kpi_two',
        'target_landing',
        'tercapai_landing',
        'kurang_landing',
        'nilai_two',
        'total_two',
        'indicator_three',
        'kpi_three',
        'target_notif',
        'tercapai_notif',
        'kurang_notif',
        'target_aplikasi',
        'tercapai_aplikasi',
        'kurang_aplikasi',
        'nilai_three',
        'total_three',
        'indicator_four',
        'kpi_four',
        'notes_four',
        'nilai_four',
        'total_four',
        'indicator_five',
        'kpi_five',
        'notes_five',
        'nilai_five',
        'total_five',
        'indicator_six',
        'kpi_six',
        'notes_six',
        'nilai_six',
        'total_six',
        'description',
    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
