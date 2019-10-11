<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estimate extends Model
{
    // protected $fillable = [
    //     'project_id',
    //     'time',
    //     'price_per_hour',
    //     'equipment_cost',
    //     'sub_contractors',
    //     'sub_contractors_cost',
    //     'similar_projects',
    //     'rating',
    //     'currency_id',
    //     'start',
    //     'end',
    // ];


    protected $guarded = ['id'];

}
