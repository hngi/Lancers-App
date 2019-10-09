<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ModelsCountryModel;

class CountryCountryController extends Controller
{
    public function country(){
        return response()->json(ModelsCountryModel::get(), 200);

    }
}
