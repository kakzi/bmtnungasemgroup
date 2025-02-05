<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SelfiBrankas extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    public function audit(){
        return $this->belongsTo(Audit::class);
    }
    public function question_selfi_brankas(){
        return $this->hasMany(QuestionSelfiBrankas::class);
    }
}
