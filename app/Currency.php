<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    //
    protected $guarded = ['id'];

    protected $fillable = [
        'id',
        'name',
        'code',
        'symbol',
        'created'
    ];
}
