<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\FilmResource;
use App\Models\Film;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class WatchlistController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $watchlist = auth()->user()
            ->watchlist()
            ->with(['genres', 'actors'])
            ->paginate(15);

        return FilmResource::collection($watchlist);
    }

    public function store(Film $film): JsonResponse
    {
        $user = auth()->user();
        
        if ($user->watchlist()->where('film_id', $film->id)->exists()) {
            return response()->json([
                'message' => 'Film is already in watchlist'
            ], 422);
        }

        $user->watchlist()->attach($film->id);

        return response()->json([
            'message' => 'Film added to watchlist successfully'
        ]);
    }

    public function destroy(Film $film): JsonResponse
    {
        $user = auth()->user();
        
        if (!$user->watchlist()->where('film_id', $film->id)->exists()) {
            return response()->json([
                'message' => 'Film is not in watchlist'
            ], 422);
        }

        $user->watchlist()->detach($film->id);

        return response()->json([
            'message' => 'Film removed from watchlist successfully'
        ]);
    }
} 