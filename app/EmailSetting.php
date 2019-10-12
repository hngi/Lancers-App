<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailSetting extends Model
{
    //
    protected $table='email_settings';

    protected $guarded = ['id'];


    //Email setting to User model relationship
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
