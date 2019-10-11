<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    protected $guarded = ['id'];

    public static $FLW_PRV_KEY = "FLWSECK_TEST-e548bc456532d39f455d018eb0cdbb99-X"; //FLWSECK-0c8277527567970807f1d1d03cc24963-X
    public static $FLW_PUB_KEY = "FLWPUBK_TEST-a4f3eb749643a07b16548ed127d5104f-X"; //FLWPUBK-f5e36f931843b0df7ee330fd69108609-X

    public static function generateRef(){
    	return "LNCR_TX_".time();
    }

    public function user(){
    	return $this->belongsTo('App\User');
    }
}
