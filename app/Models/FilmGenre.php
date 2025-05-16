<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilmGenre extends Model
{
    /** @use HasFactory<\Database\Factories\FilmGenreFactory> */
    use HasFactory;
    protected $fillable = [
        'film_id',
        'genre_id'
    ];
    public function films()
    {
        return $this->belongsToMany(Film::class, 'film_genres', 'film_id', 'genre_id');
    }
}
