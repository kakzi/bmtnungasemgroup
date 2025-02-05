<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuestionCheckBrankas extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    public function question_check_brankas(){
        return $this->belongsTo(CheckBrankas::class);
    }
}
