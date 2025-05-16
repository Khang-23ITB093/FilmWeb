<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Rating\StoreRatingRequest;
use App\Http\Resources\RatingResource;
use App\Models\Film;
use App\Models\Rating;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class RatingController extends Controller
{
    public function index(Film $film): AnonymousResourceCollection
    {
        $ratings = $film->ratings()->with('user')->paginate(15);
        return RatingResource::collection($ratings);
    }

    public function store(StoreRatingRequest $request, Film $film): JsonResponse
    {
        $user = auth()->user();
        
        $rating = $film->ratings()->updateOrCreate(
            ['user_id' => $user->id],
            ['rating' => $request->rating]
        );

        return response()->json([
            'message' => 'Rating submitted successfully',
            'rating' => new RatingResource($rating)
        ]);
    }

    public function destroy(Film $film, Rating $rating): JsonResponse
    {
        if ($rating->user_id !== auth()->id()) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 403);
        }

        $rating->delete();

        return response()->json([
            'message' => 'Rating deleted successfully'
        ]);
    }
} 