<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StateModel extends Model
{
    protected $table ="states";

    protected $fillable = [
        'id',
        'name',
        'country_id',
        'created'
    ];
}
