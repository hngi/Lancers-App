<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    //
    protected $guarded = ['id'];

    protected $fillable = [
        'id',
        'name',
        'country_id',
        'created'
    ];
}
