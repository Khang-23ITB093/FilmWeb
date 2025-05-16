<?php

namespace App\Http\Requests\Film;

use Illuminate\Foundation\Http\FormRequest;

class StoreFilmRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'release_date' => ['required', 'date'],
            'duration' => ['required', 'integer'],
            'rating' => ['required', 'string', 'max:10'],
            'genre_ids' => ['required', 'array'],
            'genre_ids.*' => ['exists:genres,id'],
            'actor_ids' => ['required', 'array'],
            'actor_ids.*' => ['exists:actors,id'],
            'poster_url' => ['required', 'url'],
            'backdrop_url' => ['required', 'url'],
        ];
    }
} 