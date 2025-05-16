<?php

namespace Database\Factories;

use App\Models\Genre;
use App\Models\Film;
use App\Models\FilmGenre;
use Illuminate\Database\Eloquent\Factories\Factory;

class FilmGenreFactory extends Factory
{
    protected $model = FilmGenre::class;
    public function definition(): array
    {
        return [
            'film_id' => Film::factory()->create()->id,
            'genre_id' => rand(1, 7),
        ];
    }
}
