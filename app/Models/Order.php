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
    ];

    public function admission()
    {
        return $this->hasOne(Admission::class);
    }

    // public static function storeFromPayment(array $data): self
    // {
    //     return self::updateOrCreate(
    //         ['transaction_id' => $data['transaction_id']],
    //         [
    //             'training_package_id' => $data['training_package_id'],
    //             'amount'              => $data['amount'],
    //             'currency'            => $data['currency'],
    //             'status'              => $data['status'] ?? 'Processing',
    //             'bank_tran_id'        => $data['bank_tran_id'] ?? null,
    //             'card_type'           => $data['card_type'] ?? null,
    //             'card_issuer'         => $data['card_issuer'] ?? null,
    //         ]
    //     );
    // }

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
}
