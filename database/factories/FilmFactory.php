<?php

namespace Database\Factories;

use App\Models\Genre;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Film>
 */
class FilmFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->company,
            'description' => $this->faker->paragraph,
            'release_date' => $this->faker->dateTimeBetween('1975-01-01', 'now'),
            'type' => $this->faker->randomElement(['movie', 'show']),
            'status' => true ,
            'duration' => $this->faker->numberBetween(60, 200),
            'average_rating' => $this->faker->randomFloat(2, 1, 10),
            'slug' => Str::slug($this->faker->unique()->company),
            'video_path' => null,

        ];
    }
}
