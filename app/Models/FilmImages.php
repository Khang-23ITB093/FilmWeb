<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilmImages extends Model
{
    use HasFactory;

    protected $fillable = [
        'film_id',
        'backgrounds',
        'posters',
    ];

    protected $casts = [
        'backgrounds' => 'array',
        'posters' => 'array',
    ];

    public function film()
    {
        return $this->belongsTo(Film::class);
    }
}
