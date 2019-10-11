<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //Specify database table and the fields to be interacted with

    protected $guarded = ['id'];

    protected $casts = [
    	'team' => 'array'
    ];
}
