<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecapitulationHR extends Model
{
    protected $fillable = [
        'note',
        'start_periode',
        'end_periode',
        'make_by',
    ];
}
