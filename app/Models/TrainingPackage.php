<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrainingPackage extends Model
{
    protected $fillable = [
        'name',
        'description',
        'duration',
        'price',
        'status',
        'is_popular',
        'meta_title',
        'meta_description',
    ];

    protected $casts = [
    'is_popular' => 'boolean',
];

    public function images()
    {
        return $this->hasMany(TrainingPackageImage::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'training_package_id');
    }
}
