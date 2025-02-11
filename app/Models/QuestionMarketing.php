<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuestionMarketing extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    public function pendampingan_marketing(){
        return $this->belongsTo(PendampinganMarketing::class);
    }
}
