<?php

namespace Database\Factories;

use App\Models\Actor;
use Illuminate\Database\Eloquent\Factories\Factory;

class ActorFactory extends Factory
{
    protected $model = Actor::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'images' => json_encode([
                'image_1' => $this->faker->imageUrl(),
                'image_2' => $this->faker->imageUrl(),
            ]),
        ];
    }
}
