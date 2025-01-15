<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Procedure extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'type',
        'descriptions',
        'number',
        'file'
    ];


    protected function file(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => asset('/storage/file/' . $value),
        );
    }
}
