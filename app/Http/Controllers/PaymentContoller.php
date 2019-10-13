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


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($type)
    {
        $user = Auth::user();

        $subcriptions = SubscriptionPlan::all();
        $key = Transaction::$PYS_PUB_KEY;
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
                    return $this->error("Sorry, you cannot downgrade your subscription");
                }

                if($data['id'] > $sub->plan_id){                    
                    $remaining = Carbon::parse($sub->enddate)->diffInDays(Carbon::parse($sub->startdate));
                    $plan = SubscriptionPlan::find($sub->plan_id);

                    $price_per_day = $plan->price/30;

                    $balance = $price_per_day * $remaining;

                    $data['balance'] = $balance;
                }
            }

            // if($data['id'] == 1){
            //     return redirect($data['redirect']);
            // }
            return $this->success("payment details retrieved", $data);
        }else{
            return $this->error("Invalid payment option");
        }
    }


    public function invoicePayment($ref)
    {
        if($ref == null){
            return $this->error("Invalid payment option");
        }else{
            $invoice = Invoice::where('created_at', Carbon::parse($ref))->first();

            if(!empty($invoice)){
                return $this->error("Invalid payment option"); 
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

            return $this->success("payment details retrieved", $data);
        }
    }
}
