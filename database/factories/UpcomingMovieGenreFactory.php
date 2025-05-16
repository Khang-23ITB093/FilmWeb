<?php

namespace Database\Factories;

use App\Models\Genre;
use App\Models\UpcomingMovieGenre;
use App\Models\UpcomingMovie;
use Illuminate\Database\Eloquent\Factories\Factory;

class UpcomingMovieGenreFactory extends Factory
{
    protected $model = UpcomingMovieGenre::class;
    public function definition(): array
    {
        return [
            'upcoming_movie_id' => UpcomingMovie::factory()->create()->id,
            'genre_id' => rand(1, 7),
        ];
    }
}
