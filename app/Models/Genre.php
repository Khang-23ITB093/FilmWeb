<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    /** @use HasFactory<\Database\Factories\GenreFactory> */
    use HasFactory;

    protected $fillable = [
        'name'
    ];



    public function films()
    {
        return $this->belongsToMany(Film::class, 'film_genres', 'genre_id', 'film_id');
    }

    public function upcomings()
    {
        return $this->belongsToMany(UpcomingMovie::class, 'upcoming_genres', 'genre_id', 'upcoming_movie_id');
    }
}
