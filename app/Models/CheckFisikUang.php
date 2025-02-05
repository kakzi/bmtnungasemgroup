<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CheckFisikUang extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    public function audit(){
        return $this->belongsTo(Audit::class);
    }
    public function question_cfu(){
        return $this->hasMany(QuestionCFU::class);
    }

}
