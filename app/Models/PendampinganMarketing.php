<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PendampinganMarketing extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    public function question_marketing(){
        return $this->belongsTo(QuestionMarketing::class);
    }
    public function antiFraud(){
        return $this->belongsTo(AntiFroud::class);
    }
}
