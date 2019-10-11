<?php

namespace App\Http\Controllers;

use App\Http\Resources\TransactionsResource;
use App\transactions;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaction = Transactions::all();
        return response()->json([
            "status" => "success",
            "code" => 200,
            "message" => "OK",
            "data" => $transaction
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $transactions = new Transactions();
        $transactions->title = $request->title;
        $transactions->username = $request->username;
        $transactions->first_name = $request->first_name;
        $transactions->last_name = $request->last_name;
        $transactions->transaction_ref = $request->transaction_ref;
        $transactions->amount = $request->amount;
        $transactions->customer_email = $request->customer_email;
        $transactions->country = $request->country;
        $transactions->currency = $request->currency;
        $transactions->narration = $request->narration;
        $transactions->phone_number = $request->phone_number;
        $transactions->payment_method = $request->payment_method;
        $ref =Transactions::where('transaction_ref', $request->transaction_ref)->firstOrFail();
        if(!$ref) {
            if ($transactions->save()) {
                return response()->json([
                    "status" => "success",
                    "code" => 200,
                    "message" => "OK",
                    "data" => $transactions
                ], 200);
            } else {
                return response()->json([
                    "status" => "failed",
                    "code" => 200,
                    "message" => "failed to save transactions",
                    "data" => $transactions
                ], 200);
            }
        }else{
            return response()->json([
                "status" => "failed",
                "code" => 200,
                "message" => "transaction with reference number ".$request->transaction_ref." already exist!",
                "data" => null
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\transactions  $transactions
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaction = new TransactionsResource(Transactions::FindOrFail($id));
        if($transaction) {
            return response()->json([
                "status" => "success",
                "code" => 200,
                "message" => "OK",
                "data" => $transaction
            ], 200);
        }else{
            return response()->json([
                "status" => "failed",
                "code" => 200,
                "message" => "no data found",
                "data" => $transaction
            ], 200);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\transactions  $transactions
     * @return \Illuminate\Http\Response
     */
    public function edit(transactions $transactions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\transactions  $transactions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, transactions $transactions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaction = new TransactionsResource(Transactions::FindOrFail($id));
        if($transaction) {
            $result = $transaction->delete();
            if ($result) {
                return response()->json([
                    "status" => "success",
                    "code" => 200,
                    "message" => "OK",
                    "data" => $result
                ], 200);
            } else {
                return response()->json([
                    "status" => "failed",
                    "code" => 200,
                    "message" => "Unable to delete transaction",
                    "data" => null
                ], 200);
            }
        }else{
            return response()->json([
                "status" => "failed",
                "code" => 200,
                "message" => "Transaction with ".$id." does not exist",
            ], 200);
        }

    }
}
