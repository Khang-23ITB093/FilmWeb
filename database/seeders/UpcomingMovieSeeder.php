<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UpcomingMovie;
use App\Models\UpcomingMovieGenre;

class UpcomingMovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //UpcomingMovie::factory(30)->create();
        UpcomingMovieGenre::factory(35)->create();
    }
}
