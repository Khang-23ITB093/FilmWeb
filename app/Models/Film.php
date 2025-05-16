<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'slug',
        'release_date',
        'type',
        'status',
        'video_path',
        'duration',
        'average_rating',
    ];

    protected $casts = [
        'video_path' => 'array',
        'release_date' => 'date',
    ];

    public function filmImages()
    {
        return $this->hasOne(FilmImages::class);
    }

    //decode video_path
    public function video()
    {
        return $this->video_path ? json_decode($this->video_path) : [];
    }

    public function getBackgroundsAttribute()
    {
        return $this->filmImages ? json_decode($this->filmImages->backgrounds, true) : [];
    }

    public function getPostersAttribute()
    {
        return $this->filmImages ? json_decode($this->filmImages->posters, true) : [];
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'film_genres', 'film_id', 'genre_id');
    }

    public function actors()
    {
        return $this->belongsToMany(Actor::class, 'film_actors', 'film_id', 'actor_id');
    }

    public function date()
    {
        return $this->release_date->format('M d, Y');
    }

    public function releaseYear()
    {
        return $this->release_date->format('Y');
    }

    public function seasons()
    {
        return $this->hasMany(Season::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function hasManySeasons(): bool
    {
        return $this->hasMany(Season::class)->count() > 1;
    }

    public function isMovie(): bool
    {
        return $this->type === 'movie';
    }

    public function isShow(): bool
    {
        return $this->type === 'show';
    }

    public function total_ratings()
    {
        return $this->hasMany(Rating::class)->count();
    }

}
