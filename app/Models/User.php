<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use 
    HasFactory,
    HasRoles, 
    HasApiTokens,
    Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'office_id',
        'address',
        'province_id',     // Menambahkan kolom yang diizinkan
        'city_id',         // Menambahkan kolom yang diizinkan
        'district_id',     // Menambahkan kolom yang diizinkan
        'subdistrict_id',  // Menambahkan kolom yang diizinkan
        'postal_code',
        'role_id',
        'career_id',
        'is_active',     // Menambahkan kolom yang diizinkan

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'office_id',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function office(): BelongsTo
    {
        return $this->belongsTo(Office::class, 'office_id');
    }
    // public function roles(): BelongsTo
    // {
    //     return $this->belongsTo(Roles::class, 'role_id');
    // }

    protected $casts = [
        'office_id' => 'array',
    ];

    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'user_id');
    }
    public function karakters()
    {
        return $this->hasMany(Karakter::class, 'user_id');
    }
}
