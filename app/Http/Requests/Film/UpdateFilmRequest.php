<?php

namespace App\Http\Requests\Film;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFilmRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['sometimes', 'string', 'max:255'],
            'description' => ['sometimes', 'string'],
            'release_date' => ['sometimes', 'date'],
            'duration' => ['sometimes', 'integer'],
            'rating' => ['sometimes', 'string', 'max:10'],
            'genre_ids' => ['sometimes', 'array'],
            'genre_ids.*' => ['exists:genres,id'],
            'actor_ids' => ['sometimes', 'array'],
            'actor_ids.*' => ['exists:actors,id'],
            'poster_url' => ['sometimes', 'url'],
            'backdrop_url' => ['sometimes', 'url'],
        ];
    }
} 