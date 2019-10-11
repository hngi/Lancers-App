<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = ['id'];

    public function invoice(){
        return $this->hasOne('App\Invoice');
    }
    
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function client()
    {
    	return $this->belongsTo('App\Client');
    }

    public function estimate()
    {
        return $this->hasOne('App\Estimate');
    }

    public function tasks()
    {
        return $this->hasMany('App\Task');
    }

    public static function generateTrackingCode()
    {
        return "LNCR_PTRCK_".time(); 
    }

    protected $casts = [
        'collaborators' => 'array'
    ];
}
