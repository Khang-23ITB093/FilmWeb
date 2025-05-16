<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    /** @use HasFactory<\Database\Factories\ReviewFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'film_id',
        'rating',
    ];

    // Quan hệ với User
    public function user()
    {
        return $this->belongsTo(    User::class);
    }

    // Quan hệ với Film
    public function film()
    {
        return $this->belongsTo(Film::class);
    }
}
