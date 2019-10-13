<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
        protected $guarded = 'id';

    public function user(){
        return $this->belongsTo('App\User');
    }
    
    public function country(){
        return $this->belongsTo('App\Country');
    }
    
    public function state(){
        return $this->belongsTo('App\State');
    }

    // protected $fillable = ["user_id", "name", "email", "profile_picture", "street", "street_number", "city", "country_id", "state_id", "zipcode", "timezone", "contacts"];




    public function project()
    {
        return $this->hasMany('App\Project');
    }

}
