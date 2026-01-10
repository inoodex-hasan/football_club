<?php

namespace App\Models;

use App\Traits\ImageUploadTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Admission extends Model
{
    use ImageUploadTrait;
    protected $fillable = [
        'order_id',
        'training_package_id',
        'name',
        'email',
        'phone',
        'educational_qualification',
        'address',
        'nid',
        // 'dob',
        'age',
        'image',
        'status', // completed, refunded
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
