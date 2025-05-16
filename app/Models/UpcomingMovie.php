<?php

namespace App\Models;

use App\Livewire\HomeUpcomingMovies;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpcomingMovie extends Model
{
    /** @use HasFactory<\Database\Factories\UpcomingMovieFactory> */
    use HasFactory;
    protected $fillable = [
        'title_upcoming',
        'release_month_upcoming',
        'release_day_upcoming',
        'release_year_upcoming',
        'links'
    ];


    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'upcoming_movie_genres', 'upcoming_movie_id', 'genre_id');
    }
}
