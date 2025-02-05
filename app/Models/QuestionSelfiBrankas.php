<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuestionSelfiBrankas extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    public function question_selfi_brankas(){
        return $this->belongsTo(SelfiBrankas::class);
    }
}
