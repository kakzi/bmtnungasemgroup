<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attendance extends Model
{
    
    use HasFactory;

    protected $guarded = [];

    public function scopeCountAttendance($query, $status)
    {
        return $query->whereDate('created_at', Carbon::today())
            ->where('status', $status)->count();
    }

    public function detail()
    {
        return $this->hasMany(AttendanceDetail::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function office()
    {
        return $this->belongsTo(Office::class);
    }
}
