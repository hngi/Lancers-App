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
    	$countries = Country::select('id', 'name')->get();

        return $this->SUCCESS($countries);
    }

    public function states($id){
    	$states = State::where('country_id', $id)->select('id', 'name')->get();

        return $this->SUCCESS($states);
    }

    public function currencies()
    {
    	$currencies = Currency::select('id','code')->get();

        return $this->SUCCESS($currencies);
    }
}
