<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    protected $table="profiles";

    protected $guarded = ['id'];

    protected $casts = [
    	'contacts' => 'array'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
