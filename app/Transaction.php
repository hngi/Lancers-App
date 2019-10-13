<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    protected $guarded = ['id'];

    // public static $FLW_PRV_KEY = "FLWSECK_TEST-4c88a3b8bfe99936017961968dddb514-X"; //FLWSECK-0c8277527567970807f1d1d03cc24963-X
    // public static $FLW_PUB_KEY = "FLWPUBK_TEST-e0fb1ed52ff86fcb0b207d661ed120d4-X"; //FLWPUBK-f5e36f931843b0df7ee330fd69108609-X

    public static $PYS_PRV_KEY = "sk_test_99d0854c6a1c1f56b4c0b95a9aa35360fcfaebfb";
    public static $PYS_PUB_KEY = "pk_test_ff89fe3c466f456f302dc1706f5c674f7de70e85";

    public static function generateRef(){
    	return "LNCR_TX_".time();
    }

    public function user(){
    	return $this->belongsTo('App\User');
    }
}
