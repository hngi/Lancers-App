<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    
    public function client(){
        return $this->hasOne('App\Client');
    }
    protected $guarded = ['id'];
}
