<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //Specify database table and the fields to be interacted with

    protected $guarded = ['id'];

    protected $casts = [
    	'team' => 'array'
    ];

    public function project()
    {
    	return $this->belongsTo('App\Project', 'project_id', 'id');
    }
}
