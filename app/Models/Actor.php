<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    /** @use HasFactory<\Database\Factories\ActorFactory> */
    use HasFactory;
    protected $fillable = [
        'name',
        'images',
    ];

    protected $casts = [
        'images' => 'array',
    ];

    public function films()
    {
        return $this->belongsToMany(Film::class, 'film_actors', 'actor_id', 'film_id'); // Chú ý thứ tự tham số
    }


}
