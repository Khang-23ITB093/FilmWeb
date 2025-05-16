<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class   UpcomingMovieGenre extends Model
{
    /** @use HasFactory<\Database\Factories\UpcomingGenreMovieFactory> */
    use HasFactory;
    protected $fillable = [
        'upcoming_movie_id',
        'genre_id'
    ];
    public function upcomings()
    {
        return $this->belongsToMany(UpcomingMovie::class, 'upcoming_movie_genres', 'upcoming_movie_id', 'genre_id');
    }
}
