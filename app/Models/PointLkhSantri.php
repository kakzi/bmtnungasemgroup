<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PointLkhSantri extends Model
{
    protected $fillable = [
        'user_id',
        'point_lkh',
        'point_kehadiran',
        'date_lkh'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
