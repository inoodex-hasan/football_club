<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title',
        'details',
        'main_image',
        'images',
        'start_date',
        'end_date',
        'location',
        'start_time',
        'end_time',
        'status',
    ];

    protected $casts = [
        'images' => 'array',
    ];
}
