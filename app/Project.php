<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function invoice(){
        return $this->hasOne('App\Invoice');
    }
    
    public function user(){
        return $this->belongsTo('App\User');
    }
}
