<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'training_package_id',
        'transaction_id', // tran_id
        'amount',
        'currency',
        'status',        // Pending, Processing, Paid, Refunded
        'bank_tran_id',  // optional
        'card_type',     // optional
        'card_issuer',   // optional
        'payment_method',
    ];

    public function admission()
    {
        return $this->hasOne(Admission::class);
    }

    public function refund()
    {
        if ($this->status !== 'Refunded') {
            $this->update(['status' => 'Refunded']);
        }

        if ($this->admission) {
            $this->admission->update(['status' => 'refunded']);
        }

        return $this;
    }

    // Relation to TrainingPackage
    public function package()
    {
        return $this->belongsTo(TrainingPackage::class, 'training_package_id');
    }

    public function trainingPackage()
    {
        return $this->belongsTo(TrainingPackage::class, 'training_package_id');
    }
}
