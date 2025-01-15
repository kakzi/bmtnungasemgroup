<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SyncDate extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_start',
        'date_end',
    ];
}
