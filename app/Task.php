<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //Specify database table and the fields to be interacted with
    
    protected $table = 'tasks';
    protected $fillable = ['name', 'progress', 'team', 'due_date', 'start_date', 'project_id', 'status','created_at', 'updated_at'];
}
