<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Currency;

class CurrencyController extends Controller
{
    public function currency(){
        return response()->json(Currency::get(), 200);

    }
}

