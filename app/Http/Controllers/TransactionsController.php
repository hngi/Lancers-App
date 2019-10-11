<?php

namespace App\Http\Controllers;

use Auth;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TransactionsController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $user = Auth::user();
        $user = \App\User::find(1);
        $transactions = $user->transactions;
        
        return response()->json([
            "status" => "success",
            "code" => 200,
            "message" => "OK",
            "data" => $transactions
        ], 200);
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaction = Transaction::FindOrFail($id);

        // $user = Auth::user();
        $user = \App\User::find(1);

        if($transaction) {
            if($user->id == $transaction->user_id){                
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
                    "message" => "You are not authorized to delete this transaction",
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
