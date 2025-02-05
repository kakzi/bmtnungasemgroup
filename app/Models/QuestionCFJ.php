<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuestionCFJ extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    public function question_cfj(){
        return $this->belongsTo(CheckFisikJaminan::class);
    }
}
