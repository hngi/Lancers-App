<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
      //User model to Email setting relationship
    public function emailsetting()
    {
        return $this->hasOne('App\EmailSetting');
    }

    public function profile()
    {
        return $this->hasOne('App\Profile');
    }
    
    public function transactions(){
        return $this->hasMany('App\Transaction');
    }

    public function subscription(){
        return $this->hasOne('App\Subscription');
    }

    public function projects(){
        return $this->hasMany('App\Project');
    }
    
    public function clients(){
        return $this->hasMany('App\Client');
    }
    
    

}
