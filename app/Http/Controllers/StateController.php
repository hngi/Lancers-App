<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\State;

class StateController extends Controller
{
    public function state(){
        return response()->json(State::get(), 200);

    }
}
