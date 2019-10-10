<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CurrencyModel extends Model
{
    protected $table ="currencies";

    protected $fillable = [
        'id',
        'name',
        'code',
        'symbol',
        'created'
    ];
}
