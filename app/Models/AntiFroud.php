<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AntiFroud extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function pendampingan_marketing(){
        return $this->hasMany(PendampinganMarketing::class);
    }
    public function antiFraud(){
        return $this->hasMany(PendampinganMarketing::class);
    }

}
