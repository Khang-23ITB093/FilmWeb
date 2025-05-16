<?php

namespace App\Jobs;

use App\Models\Film;
use App\Models\Season;
use App\Models\Episode;
use App\Models\Actor;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class FetchTrendingShows implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $apiKey = env('TMDB_API_KEY');
        $baseUrl = 'https://api.themoviedb.org/3/trending/tv/day';
        $totalShows = 100;
        $shows = [];
        $pages = ceil($totalShows / 20);

        for ($page = 1; $page <= $pages; $page++) {
            $response = \Http::get($baseUrl, [
                'api_key' => $apiKey,
                'page' => $page,
            ]);

            if ($response->ok()) {
                $data = $response->json();
                $shows = array_merge($shows, $data['results']);
            } else {
                \Log::error("Failed to fetch page $page: " . $response->body());
                break;
            }

            if (count($shows) >= $totalShows) {
                break;
            }
        }

        // Save to database
        foreach (array_slice($shows, 0, $totalShows) as $showData) {
            $show = Film::updateOrCreate(
                ['title' => $showData['name']], // Check for duplicates by title
                [
                    'description' => $showData['overview'],
                    'slug' => \Str::slug($showData['name']) . '-' . \Str::random(6),
                    'release_date' => Carbon::parse($showData['first_air_date'])->toDateString(),
                    'type' => 'show',
                    'status' => true,
                    'video_path' => null,
                    'duration' => null,
                    'average_rating' => $showData['vote_average'],
                ]
            );

            // Save genres
            if (isset($showData['genre_ids'])) {
                $show->genres()->sync($showData['genre_ids']);
            }

            // Save images
            $show->filmImages()->updateOrCreate(
                ['film_id' => $show->id],
                [
                    'backgrounds' => json_encode(['https://image.tmdb.org/t/p/original' . $showData['backdrop_path']]),
                    'posters' => json_encode(['https://image.tmdb.org/t/p/original' . $showData['poster_path']]),
                ]
            );

            // Fetch seasons and episodes
            $this->fetchAndSaveSeasons($show, $showData['id']);
            //Fetch actors
            $this->fetchAndSaveActors($show, $showData['id']);
        }

        \Log::info('Trending TV shows have been successfully updated!');
    }

    /**
     * Fetch and save seasons and episodes for a specific TV Show.
     *
     * @param Film $show
     * @param int $showId
     * @return void
     */
    protected function fetchAndSaveSeasons(Film $show, int $showId)
    {
        $apiKey = env('TMDB_API_KEY');
        $response = \Http::get("https://api.themoviedb.org/3/tv/$showId", [
            'api_key' => $apiKey,
        ]);

        if ($response->ok()) {
            $showDetails = $response->json();

            foreach ($showDetails['seasons'] as $seasonData) {
                $season = Season::updateOrCreate(
                    ['film_id' => $show->id, 'season_number' => $seasonData['season_number']],
                    [
                        'film_id' => $show->id,
                        'episodes_count' => $seasonData['episode_count'],
                        'status' => true,
                    ]
                );

                // Fetch episodes for each season
                $this->fetchAndSaveEpisodes($season, $showId, $seasonData['season_number']);
            }
        } else {
            \Log::error("Failed to fetch details for TV Show $showId: " . $response->body());
        }
    }

    /**
     * Fetch and save episodes for a specific season.
     *
     * @param Season $season
     * @param int $showId
     * @param int $seasonNumber
     * @return void
     */
    protected function fetchAndSaveEpisodes(Season $season, int $showId, int $seasonNumber)
    {
        $apiKey = env('TMDB_API_KEY');
        $response = \Http::get("https://api.themoviedb.org/3/tv/$showId/season/$seasonNumber", [
            'api_key' => $apiKey,
        ]);

        if ($response->ok()) {
            $seasonDetails = $response->json();

            foreach ($seasonDetails['episodes'] as $episodeData) {
                Episode::updateOrCreate(
                    [
                        'season_id' => $season->id,
                        'episode_number' => $episodeData['episode_number'],
                    ],
                    [
                        'title' => $episodeData['name'],
                        'description' => $episodeData['overview'],
                        'release_date' => Carbon::parse($episodeData['air_date'])->toDateString(),
                        'status' => true,
                        'duration' => $episodeData['runtime'] ?? 0,
                        'video_path' => json_encode(['https://share.nplayervn.workers.dev/0:/08.%20J2TEAM%20MOVIE/Bumblebee/Bumblebee.mp4']),
                        'image' => 'https://image.tmdb.org/t/p/original' . $episodeData['still_path'],
                    ]
                );
            }
        } else {
            \Log::error("Failed to fetch episodes for Season $seasonNumber of TV Show $showId: " . $response->body());
        }
    }

    protected function fetchAndSaveActors(Film $film, int $showId)
    {
        $apiKey = env('TMDB_API_KEY');
        $response = \Http::get("https://api.themoviedb.org/3/tv/$showId/credits", [
            'api_key' => $apiKey,
        ]);

        if ($response->ok()) {
            $credits = $response->json();
            $cast = $credits['cast'] ?? [];
            $i = 0;
            foreach ($cast as $actorData) {
                $i++;
                if ($i > 5) {
                    break;
                }
                $actor = Actor::updateOrCreate(
                    [
                        'name' => $actorData['name'],
                        'images' => json_encode(['https://media.themoviedb.org/t/p/w138_and_h175_face' . $actorData['profile_path']]),
                    ]
                );

                // Link actor to the film
                $film->actors()->syncWithoutDetaching($actor->id);
            }
        } else {
            \Log::error("Failed to fetch actors for movie $showId: " . $response->body());
        }
    }
}
