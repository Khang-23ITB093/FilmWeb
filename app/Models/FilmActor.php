<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilmActor extends Model
{
    /** @use HasFactory<\Database\Factories\FilmActorFactory> */
    use HasFactory;
    protected $fillable = [
        'film_id',
        'actor_id'
    ];
    public function films()
    {
        return $this->belongsToMany(Film::class, 'film_actors', 'actor_id', 'film_id');
    }
}
