<?php

namespace App\Http\Controllers;

use Auth;
use App\Transaction;
use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;

class TransactionsController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return request();
        $user = Auth::user();
        $transactions = $user->transactions()->paginate();
        
        return $this->success("ok",$transactions);
    }



}
