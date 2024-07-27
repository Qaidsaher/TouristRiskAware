<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'capital',
        'language',
        'population',
        'image',
        'overview',
    ];

    public function attractions()
    {
        return $this->hasMany(Attraction::class);
    }

    public function risks()
    {
        return $this->hasMany(Risk::class);
    }

    public function tourismPlaces()
    {
        return $this->hasMany(TourismPlace::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
