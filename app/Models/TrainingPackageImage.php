<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrainingPackageImage extends Model
{
    protected $fillable = ['training_package_id', 'image'];

    public function package()
    {
        return $this->belongsTo(TrainingPackage::class, 'training_package_id');
    }
}
