<?php

namespace App\Http\Controllers;

use Auth;
use Carbon\Carbon;
use App\Transaction;
use App\Subscription;
use App\SubscriptionPlan;
use Illuminate\Http\Request;

class PaymentContoller extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($type, $ref = null)
    {
        $user = Auth::user();

        $subcriptions = SubscriptionPlan::all();
        $key = Transaction::$FLW_PUB_KEY;
        $txRef = Transaction::generateRef();

        $payment_types = [];
        $type = trim($type);

        // get all subscription plans and fill details in payment_types
        foreach ($subcriptions as $subcription) {

            $payment_types[$subcription->name] = [
                'name' => str_replace("_", " ",$subcription->name)." plan",
                'amount' => $subcription->price,
                'type' => 'sub',
                'id' => $subcription->id,
                'redirect' => '/users/subscribe/',
                'key' => $key,
                'ref' => $txRef,
                'balance' => 0
            ];   
        }

        if(in_array($type, array_keys($payment_types))){
            // if the requested payment is a subcription
            $data = $payment_types[$type];

            // get the users current subcription
            $sub = $user->subscription;

            // check if there's still some days left for the plan to exprire, so as to remove the cost from the charge 
            if($sub){
                if($sub->plan_id > $data['id']){
                    // return session value here
                    return "Sorry, you cannot downgrade your subscription";
                }

                $remaining = Carbon::parse($sub->enddate)->diffInDays(Carbon::parse($sub->startdate));
                $plan = SubscriptionPlan::find($sub->plan_id);

                $price_per_day = $plan->price/30;

                $balance = $price_per_day * $remaining;

                $data['balance'] = $balance;
            }

            return view('payment')->with('data', $data);
        }else if($type == "invoice"){
            // if the requested payment is an invoice
            if($ref == null){
                return view('invalidpayment');
            }else{
                $invoice = Invoice::where('created_at', Carbon::parse($ref))->first();

                if(!empty($invoice)){
                    return view('invalidpayment');  
                }else{                  
                    $data = [
                        "name" => "Invoice #".$ref,
                        "amount" => $invoice->amount,
                        "type" => 'invoice',
                        "redirect" => '/invoice/pay/',
                        "key" => $key,
                        'ref' => $txRef,
                        "id" => $invoice->id
                    ];
                }

                return view('payment')->with('data', $data);
            }
        }else{
            return view('invalidpayment');
        }
    }
}
