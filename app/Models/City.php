<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    /** @use HasFactory<\Database\Factories\CityFactory> */
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
    ];

    public function studios()
    {
        return $this->hasMany(Studio::class);
    }

    public function country()
    {
         return $this->belongsTo(Country::class);
    }
}
