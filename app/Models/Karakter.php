<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Karakter extends Model
{
    use HasFactory;

    protected $fillable = [
        'type','laporan', 'poin', 'user_id', 'date','time'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
