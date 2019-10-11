<?php

namespace App\Http\Controllers;

use App\State;
use App\Country;
use App\Currency;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function countries()
    {
    	return Country::select('id', 'name')->get();
    }

    public function states($id){
    	return State::where('country_id', $id)->select('id', 'name')->get();
    }

    public function currencies()
    {
    	return Currency::select('id','code')->get();
    }
}
