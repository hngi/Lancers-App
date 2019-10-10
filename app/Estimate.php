<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estimate extends Model
{
    //

    protected $guarded = ['id'];

    protected $casts = [
    	'sub_contractors' => 'array'
    ];
}
