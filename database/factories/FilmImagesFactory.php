<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\film_images>
 */
class FilmImagesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $posters = [
            'https://s3-alpha-sig.figma.com/img/0c17/d988/d53d37cb094dcfe19015a1a7edf5ca3e?Expires=1734307200&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=B4ykskpc6szKUoXKqzlkO8lbEXw8fMjqnNWIcvPCmPx8GDURo25NhlMZ5wPjFv8J8AmspkBeQUoOB2bSZxTQFJvW~kN6Mt-x-gCpRFhZIMSx8VRJGqEjHG--BTOjiCUZ5~FNxyru2uKsZ0F7Ip1CpBUSADuJhqfDVIBIav1nHzzLLIXdOwT2mBDE~rR0vcyYKJbmYa-KytYAtMVXWuFPq5psl1J4FIN2FaoLxcaTgvMA1fRvIY6RB~2UUO97GGA0P9oJZu4xKiuOaUhfRAzSTsqiQ~QGcceXcVvZBKKKnVSu77MHlI5-OupAnXxjYgot8bYIQuE7JgplWzGz07b4KQ__',
            'https://s3-alpha-sig.figma.com/img/a24d/4b24/c20044eb52d673ee64d192ccc2f709cd?Expires=1734307200&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=Iex967A~1gXY-5i9QG5XRj7iNJAQOSHj6G-EhTmTh~QUgpwtRJfrZsBtdY3XlpA9I0pDAfGBayJc9k6nGYZmTCuCrjG8IHZ3Cl4ZQEkWZVIBAr6R5~AyQn5dx97buMFy1rj8Q0QudxiUOwwcTmnnyrjuk3QQWLW03V7CUPog0IIyqNYe4pnetTyMc7boch0NQzf3L5ERar09XOAYSruAGFFTbeFc4VQxV3DVhUEWMnnxSN21yc8AIuTTcj7jZt~NbJojPFWv8-JT4tqTu8lKMXyqTt9TZ32HMxTQILCNFdk~vA4q0PCrr672pJf5VOPeP5slvWtk9dBwxNG32LVN3w__',
        ];
        $images_poster = [$posters[rand(0,1)], $posters[rand(0,1)]];

        $backgrounds = [
            'https://s3-alpha-sig.figma.com/img/a03b/1cde/79db684b60bc1ca06967fa8898fa3ae2?Expires=1734307200&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=fzys86CFJyTQKzZh9K696P8tRpAAXym5tK0Qkr8EVSpUPiFWoqo6q2qH-Kdbfwo0iZgkeQ4P0mqy~wOxd9WM2qcXZXeTzqOeSgMI523CPTE787tDLAhmu8LcB7KLqgsAuAS-MEhSAgtdYDIg55o4BqjK2moDLxa0AT5yfHDZfrU~r4z8IFnBDCP-eQWGibS5duBApXIy1LeGWIWGxGKJWuUXqJxoBi-vuP-YBh8MutCXWY-mP1upKV3F6RgiumD-HcF0owDvV7Zkp9CXQKJanndoI1fl69LLpQgB7bhA4CmgtxCwCr09dGRWaSNiO41FJ6k38ZgFkbWLK9zTNvzKNg__',
            'https://s3-alpha-sig.figma.com/img/6ff6/02a8/26f63cf2ed7502a0ab05b24d848154d1?Expires=1734307200&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=HxN35~pPcBsoVIiLYrPQP3bqMRx65ybAq-Lsrv-xx3UsMa7YFnIDdEh~EPWoJw9jM8QAfkKPgUtabf736dqsUeiBuk9EkO5CmD7aAQhrmcSuaqpoiK~Yl4S2-NOCsfad4nhqoK9joecaq2CRnUwjzwv6b2mR8OBr7GuJjkea7IuFwE7cdN7sEge59WC6PjJw-OqjNjzXWBBiEH~nsV-R53r85nH9O~UqzrKzX8mN8U4OyIHirYbpdc734tsDT8hK-jaBJoaszEbqMUW6~Sou3TrA55h3ewInwkYgz2iWkqHemQMXTLKTM-MyWAmpvzFhzybcBsN4ghmti2SQjmakIQ__',
        ];
        $images_background = [$backgrounds[rand(0,1)], $backgrounds[rand(0,1)]];
        return [
            'posters' => json_encode($images_poster),
            'backgrounds'=>json_encode($images_background),
        ];
    }
}
