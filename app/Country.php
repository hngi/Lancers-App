<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    
    public function client(){
        return $this->hasOne('App\Client');
    }

    public function states()
    {
    	return $this->hasMany('App\State');
    }
    protected $guarded = ['id'];
}
