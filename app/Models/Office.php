<?php

namespace App\Models;

use Filament\Panel;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Permission\Traits\HasRoles;

class Office extends Model
{
    use HasFactory, HasRoles;

    protected $fillable = [
        'name',
        'slug',
        'telp',
        'kode_kantor',
        'village',
        'address',
        'lat',
        'long'
    ];

    //buat assesor 
    public function setNameAttribute($value){
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function anggota(): HasMany
    {
        return $this->hasMany(RegisterAnggota::class);
    }
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
    public function attendance(): HasMany
    {
        return $this->hasMany(Attendance::class);
    }
}
