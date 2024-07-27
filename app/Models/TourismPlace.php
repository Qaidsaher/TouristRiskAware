<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourismPlace extends Model
{
    use HasFactory;
    protected $fillable = [
        'country_id',
        'name',
        'description',
        'image',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
