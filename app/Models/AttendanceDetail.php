<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AttendanceDetail extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function attendance()
    {
        return $this->belongsTo(Attendance::class);
    }

    public function getPhotoAttribute($photo)
    {
        return asset('storage/absensi/'.$photo);
    }
}
