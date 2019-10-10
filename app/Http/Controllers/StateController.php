<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\StateModel;

class StateController extends Controller
{
    public function state(){
        return response()->json(StateModel::get(), 200);

    }
}
