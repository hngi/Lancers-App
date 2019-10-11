<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = ["project_id", "issue_date", "due_date", "amount", "estimate_id", "amount_paid", "status", "currency_id", "filename"];

    public function project(){
        return $this->belongsTo('App\Project');
    }
}
