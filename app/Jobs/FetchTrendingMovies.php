<?php

namespace App\Jobs;

use App\Models\Film;
use App\Models\Actor;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class FetchTrendingMovies implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $apiKey = env('TMDB_API_KEY');
        $baseUrl = 'https://api.themoviedb.org/3/trending/movie/day';
        $totalFilms = 1000;
        $films = [];
        $pages = ceil($totalFilms / 20);

        for ($page = 1; $page <= $pages; $page++) {
            $response = \Http::get($baseUrl, [
                'api_key' => $apiKey,
                'page' => $page,
            ]);

            if ($response->ok()) {
                $data = $response->json();
                $films = array_merge($films, $data['results']);
            } else {
                \Log::error("Failed to fetch page $page: " . $response->body());
                break;
            }

            if (count($films) >= $totalFilms) {
                break;
            }
        }

        // Save to database
        foreach (array_slice($films, 0, $totalFilms) as $filmData) {
            $film = Film::updateOrCreate(
                ['title' => $filmData['title']], // Check for duplicates by title
                [
                    'description' => $filmData['overview'],
                    'slug' => \Str::slug($filmData['title']) . '-' . \Str::random(6),
                    'release_date' => Carbon::parse($filmData['release_date'])->toDateString(),
                    'type' => 'movie',
                    'status' => true,
                    'video_path' => json_encode(['https://share.nplayervn.workers.dev/0:/08.%20J2TEAM%20MOVIE/Bumblebee/Bumblebee.mp4']),
                    'duration' => rand(90, 180),
                    'average_rating' => $filmData['vote_average']
                ]
            );

            // Save genres
            if (isset($filmData['genre_ids'])) {
                $film->genres()->sync($filmData['genre_ids']);
            }

            // Save images
            $film->filmImages()->updateOrCreate(
                ['film_id' => $film->id],
                [
                    'backgrounds' => json_encode(['https://image.tmdb.org/t/p/original' . $filmData['backdrop_path']]),
                    'posters' => json_encode(['https://image.tmdb.org/t/p/original' . $filmData['poster_path']]),
                ]
            );

            // Fetch and save actors
            $this->fetchAndSaveActors($film, $filmData['id']);
        }

        \Log::info('Trending movies have been successfully updated!');
    }

    protected function fetchAndSaveActors(Film $film, int $movieId)
    {
        $apiKey = env('TMDB_API_KEY');
        $response = \Http::get("https://api.themoviedb.org/3/movie/$movieId/credits", [
            'api_key' => $apiKey,
        ]);

        if ($response->ok()) {
            $credits = $response->json();
            $cast = $credits['cast'] ?? [];
            $i=0;
            foreach ($cast as $actorData) {
                $i++;
                if($i>5){
                    break;
                }
                $actor = Actor::updateOrCreate(
                    ['id' => $actorData['id']], // Unique ID from TMDb
                    [
                        'name' => $actorData['name'],
                        'images' => json_encode(['https://media.themoviedb.org/t/p/w138_and_h175_face' . $actorData['profile_path']]),
                    ]
                );

                // Link actor to the film
                $film->actors()->sync($actor->id);
            }
        } else {
            \Log::error("Failed to fetch actors for movie $movieId: " . $response->body());
        }
    }
}
