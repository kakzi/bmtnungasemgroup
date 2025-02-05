<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuestionCFU extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    public function question_cfu(){
        return $this->belongsTo(CheckFisikUang::class);
    }
}
