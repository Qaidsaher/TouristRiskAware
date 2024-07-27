<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Risk extends Model
{
    use HasFactory;
    protected $fillable = [
        'country_id',
        'type',
        'description',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
