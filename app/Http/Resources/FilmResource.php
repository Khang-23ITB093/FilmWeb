<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FilmResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'release_date' => $this->release_date,
            'duration' => $this->duration,
            'rating' => $this->rating,
            'poster_url' => $this->poster_url,
            'backdrop_url' => $this->backdrop_url,
            'genres' => GenreResource::collection($this->whenLoaded('genres')),
            'actors' => ActorResource::collection($this->whenLoaded('actors')),
            'ratings' => RatingResource::collection($this->whenLoaded('ratings')),
            'comments' => CommentResource::collection($this->whenLoaded('comments')),
            'average_rating' => $this->whenLoaded('ratings', function () {
                return $this->ratings->avg('rating');
            }),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
} 