<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Symfony\Component\Console\Question\Question;

class CheckFisikJaminan extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    public function audit(){
        return $this->belongsTo(Audit::class);
    }
    public function question_cfj(){
        return $this->hasMany(QuestionCFJ::class);
    }
}
