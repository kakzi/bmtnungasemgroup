<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Audit extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function checkFisikUang(){
        return $this->hasMany(CheckFisikUang::class);
    }
    public function checkFisikJaminan(){
        return $this->hasMany(CheckFisikJaminan::class);
    }
    public function selfiBrankas(){
        return $this->hasMany(SelfiBrankas::class);
    }
    public function checkBrankas(){
        return $this->hasMany(CheckBrankas::class);
    }
    public function office(){
        return $this->belongsTo(Office::class, 'office_id');
    }
    
}
