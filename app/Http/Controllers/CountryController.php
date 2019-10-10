<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\CountryModel;

class CountryController extends Controller
{
    public function country(){
        return response()->json(CountryModel::get(), 200);

    }
}
