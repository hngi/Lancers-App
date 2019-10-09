<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubscriptionPlan extends Model
{
    //
    protected $table = "subscription_plans";

    protected $guarded = ['id'];

    protected $casts = [
    	'features' => 'array'
    ];

    
}
