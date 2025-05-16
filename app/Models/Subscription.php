<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'price',
        'endow',
        'duration',
    ];
    protected $casts = [
        'endow' => 'array',
    ];
}
