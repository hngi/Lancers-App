<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transactions extends Model
{
    protected $fillable = [
        'amount',
        'customer_email',
        'narration',
        'payment_method',
        'phone_number',
        'title',
        'username',
        'currency',
        'first_name',
        'last_name',
        'transaction_ref'
    ];

    protected $hidden = [
        'title',
        'username'
    ];
}
