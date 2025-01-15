<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Letters extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'office_id',
        'code_id',
        'code_letters',
        'code',
        'to',
        'date_form',
        'date_to',
        'date_final',
        'from',
        'sop',
        'number',
        'periode',
        'sk',
        'type',
        'type_sk',
        'perihal',
        'lampiran',
        'desc',
        'status',
        'status_code',
        'image',
    ];


    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function offices()
    {
        return $this->belongsTo(Office::class);
    }

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => asset('/storage/qrcode/' . $value),
        );
    }
}
