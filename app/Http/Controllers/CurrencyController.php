<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\CurrencyModel;

class CurrencyController extends Controller
{
    public function currency(){
        return response()->json(CurrencyModel::get(), 200);

    }
}

