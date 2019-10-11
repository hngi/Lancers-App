<?php

namespace App\Traits;

use Auth;
use App\Invoice;
use App\Transaction;
use App\SubscriptionPlan;

Trait VerifyandStoreTransactions{

	public function verifyTransaction($ref){
		if($ref !== null){
			$data = $this->runTransactionVerification($ref);

			return $data;
		}else{
			return [
				'success' => false,
				'reason' => 'Transaction not found'
			];
		}
	}

	public function runTransactionVerification($ref)
	{
		// $ref = $_GET['txref'];
        // $amount = ""; //Correct Amount from Server
        // $currency = ""; //Correct Currency from Server



        $query = array(
            "SECKEY" => Transaction::$FLW_PRV_KEY,
            "txref" => $ref
        );

        $data_string = json_encode($query);
                
        $ch = curl_init('https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/verify');                                                                      
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                              
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

        $response = curl_exec($ch);

        $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $header = substr($response, 0, $header_size);
        $body = substr($response, $header_size);

        curl_close($ch);

        $resp = json_decode($response, true);

        // dd($resp);

        if($resp['status'] == 'error'){
        	return [
        		'success' => false,
        		'reason' => 'Transaction not found'
        	];
        }else{

	      	$paymentStatus = $resp['data']['status'];
	        $chargeResponsecode = $resp['data']['chargecode'];
	        $chargeAmount = $resp['data']['amount'];
	        $chargeCurrency = $resp['data']['currency'];

	        $meta = $resp['data']['meta'];

	        if($meta == null){
	        	header("Refresh:0");
	        }

	        $type = $meta[0]['metavalue'];

	        // dd($type);
	        $tx_id = $meta[1]['metavalue'];
	        $months = 0;
	        $status = $resp['data']['status'] == 'success' ? 1 : 2;

	        if($type == 'sub'){

	        	$plan = SubscriptionPlan::find($tx_id);

	        	$months = (int)$meta[2]['metavalue'];

	        	$amount = round($months * $plan->price, 2);

	        	$narr = 'Subscription to '.str_replace("_", " ", $plan->name)." for $months months";
	        }else{
	        	$invoice = Invoice::find($tx_id);

	        	$amount = $invoice->amount;

	        	$narr = 'Payment for invoice #'.strtotime($invoice->created_at);
	        }

	        $check_tx = Transaction::where('reference', $ref)->first();

	        if($check_tx !== null){
	        	return [
	        		'success' => false,
	        		'reason' => "This transaction has been previouly processed"
	        	];
	        }else{

		        if (($chargeResponsecode == "00" || $chargeResponsecode == "0") && ((string)$chargeAmount == (string)$amount)) {
		        	$this->storeTransaction($ref, $chargeAmount, $narr, $status);

		        	if($type == 'sub'){
		        		return [
		        			'success' => true,
		        			'plan_id' => $tx_id,
		        			'months' => $months
		        		];	
		        	}else{
		        		return [
		        			'success' => true,
		        			'invoice_id' => $tx_id
		        		];	
		        	}
		        } else {
		            //Dont Give Value and return to Failure page

		            $this->store($ref, $chargeAmount, $narr, $status);

		            return [
		            	'success' => false,
		            	'reason' => "Invalid transaction contact support with the ref number: $ref"
		            ];
		        }
	        }
        }

	}

	public function storeTransaction($ref, $amount, $narr = "", $status)
	{
		// store the transactions in the database
		Auth::user()->transaction()->create(['reference' => $ref, 'amount' => $amount, 'narration' => $narr, 'status' => $status]);
	}
}