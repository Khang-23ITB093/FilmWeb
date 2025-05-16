<?php

namespace Database\Seeders;

use App\Models\FilmImages;
use App\Models\Genre;
use App\Models\Film;
use App\Models\FilmGenre;
use App\Models\UpcomingMovie;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        $genres = [
            ['id' => 28, 'name' => 'Action'],
            ['id' => 12, 'name' => 'Adventure'],
            ['id' => 16, 'name' => 'Animation'],
            ['id' => 18, 'name' => 'Drama'],
            ['id' => 35, 'name' => 'Comedy'],
            ['id' => 80, 'name' => 'Crime'],
            ['id' => 99, 'name' => 'Documentary'],
            ['id' => 18, 'name' => 'Drama'],
            ['id' => 10751, 'name' => 'Family'],
            ['id' => 14, 'name' => 'Fantasy'],
            ['id' => 36, 'name' => 'History'],
            ['id' => 27, 'name' => 'Horror'],
            ['id' => 10402, 'name' => 'Music'],
            ['id' => 9648, 'name' => 'Mystery'],
            ['id' => 10749, 'name' => 'Romance'],
            ['id' => 10762, 'name' => 'Kids'],
            ['id' => 878, 'name' => 'Science Fiction'],
            ['id' => 10763, 'name' => 'News'],
            ['id' => 10764, 'name' => 'Reality'],
            ['id' => 10765, 'name' => 'Sci-Fi & Fantasy'],
            ['id' => 10766, 'name' => 'Soap'],
            ['id' => 10767, 'name' => 'Talk'],
            ['id' => 10768, 'name' => 'War & Politics'],
            ['id' => 10770, 'name' => 'TV Movie'],
            ['id' => 53, 'name' => 'Thriller'],
            ['id' => 10751, 'name' => 'Family'],
            ['id' => 10752, 'name' => 'War'],
            ['id' => 37, 'name' => 'Western'],
            ['id' => 10759, 'name' => 'Action & Adventure'],

        ];

        // Insert genres into the database
        foreach ($genres as $genre) {
            Genre::updateOrCreate(['id' => $genre['id']], ['name' => $genre['name'], 'images' => json_encode('resources/demo-images/adventure.png')]);
        }

        Film::factory(100)->create()->each(function ($film) {
            // Lấy ngẫu nhiên một số thể loại từ danh sách các thể loại có sẵn
            $genreIds = Genre::inRandomOrder()->take(rand(1, 4))->pluck('id');

            // Gán các thể loại vào phim mà không trùng lặp
            foreach ($genreIds as $genreId) {
                FilmGenre::firstOrCreate([
                    'film_id' => $film->id,
                    'genre_id' => $genreId,
                ]);
            }
            FilmImages::factory()->create(['film_id' => $film->id]);
        });

        UpcomingMovie::factory(30)->create();
    }
}
