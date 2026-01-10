<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['name', 'designation', 'comment', 'rating', 'image', 'status'];

protected $casts = [
    'status' => 'boolean',
    'rating' => 'integer',
];
}
