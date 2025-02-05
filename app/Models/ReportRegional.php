<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReportRegional extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'checklist_personil',
        'pendampingan',
        'km_harian',
        'kejujuran',
        'foto_tarikan',
        'wilayah',
        'briefing',
        'swot',
        'file_pendampingan',
        'file_briefing',
        'file_swot',
        'catatan_khusus',
        'check_s',
        'check_m',
        'check_as',
        'check_dir',
        'make_by',
    ];

    protected $casts = [
        'checklist_personil' => 'array',
        'file_pendampingan' => 'array',
        'file_briefing' => 'array'
    ];
}
