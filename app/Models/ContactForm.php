<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactForm extends Model
{
    protected $fillable = [
        'Full_name',
        'Email_address',
        'Phone_number',
        'Message',
    ];
}
