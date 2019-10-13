<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    protected static function GENERATE_TOKEN($length = 15, $data='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789'){
        $str = '';
        $charset=$data;
        $count = strlen($charset);
        while ($length--) {
            $str .= $charset[mt_rand(0, $count-1)];
        }

        return $str;
    }

    protected static function SUCCESS($message = 'Operation was successful', $data=[], $code = 200){
        return response()->json(['status'=>'success', 'message'=> $message, 'data'=>$data], $code);
    }

    protected static function ERROR($message = 'An error occured', $data=[], $code = 400){
        // $data = $data instanceof Object ? $data->getMessage() : $data->getMessage();
        // tempoarily disable this

        // $data = is_array($data) ? $data : $data->getMessage();
        return response()->json(['status'=>'failed', 'message'=> $message, 'data'=>$data], $code);
    }
}
