<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSubscriptions extends Model
{
    use HasFactory;
    public $timestamps = false; // Tắt tính năng timestamps của Eloquent

    protected $table = 'user_subscriptions';
    protected $fillable = [
        'user_id',
        'subscription_id',
        'subscribed_at',
        'expiry_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }

}
