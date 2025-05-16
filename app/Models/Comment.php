<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /** @use HasFactory<\Database\Factories\CommentFactory> */
    use HasFactory;
    protected $table = 'comments';
    protected $fillable = [
        'user_id', 'film_id', 'comment',
    ];

    // Quan hệ với người dùng (một bình luận thuộc về một người dùng)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Quan hệ với phim (một bình luận thuộc về một phim)
    public function film()
    {
        return $this->belongsTo(Film::class);
    }
}
