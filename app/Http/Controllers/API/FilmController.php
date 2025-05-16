<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Film\StoreFilmRequest;
use App\Http\Requests\Film\UpdateFilmRequest;
use App\Http\Resources\FilmResource;
use App\Models\Film;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function index(Request $request): AnonymousResourceCollection
    {
        $query = Film::query()
            ->with(['genres', 'actors', 'ratings', 'comments'])
            ->when($request->genre, function ($q) use ($request) {
                return $q->whereHas('genres', function ($q) use ($request) {
                    $q->where('name', $request->genre);
                });
            })
            ->when($request->year, function ($q) use ($request) {
                return $q->whereYear('release_date', $request->year);
            })
            ->when($request->sort, function ($q) use ($request) {
                return $q->orderBy($request->sort, $request->order ?? 'asc');
            });

        return FilmResource::collection(
            $query->paginate($request->per_page ?? 15)
        );
    }

    public function store(StoreFilmRequest $request): FilmResource
    {
        $film = Film::create($request->validated());

        if ($request->has('genre_ids')) {
            $film->genres()->sync($request->genre_ids);
        }

        if ($request->has('actor_ids')) {
            $film->actors()->sync($request->actor_ids);
        }

        return new FilmResource($film->load(['genres', 'actors']));
    }

    public function show(Film $film): FilmResource
    {
        return new FilmResource(
            $film->load(['genres', 'actors', 'ratings', 'comments.user'])
        );
    }

    public function update(UpdateFilmRequest $request, Film $film): FilmResource
    {
        $film->update($request->validated());

        if ($request->has('genre_ids')) {
            $film->genres()->sync($request->genre_ids);
        }

        if ($request->has('actor_ids')) {
            $film->actors()->sync($request->actor_ids);
        }

        return new FilmResource($film->load(['genres', 'actors']));
    }

    public function destroy(Film $film): JsonResponse
    {
        $film->delete();

        return response()->json([
            'message' => 'Film deleted successfully'
        ]);
    }

    public function search(string $query): AnonymousResourceCollection
    {
        $films = Film::where('title', 'like', "%{$query}%")
            ->orWhere('description', 'like', "%{$query}%")
            ->with(['genres', 'actors'])
            ->paginate(15);

        return FilmResource::collection($films);
    }
}
