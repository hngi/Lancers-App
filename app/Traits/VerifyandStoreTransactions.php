<?php

namespace App\Traits;

use Auth;
use App\Invoice;
use App\Transaction;
use App\SubscriptionPlan;
use App\Notifications\UserNotification;

Trait VerifyandStoreTransactions{

	public function verifyTransaction($ref){
		if($ref !== null){
			$data = $this->runTransactionVerification($ref);

			// dd($data);
			return $data;
		}else{
			return [
				'success' => false,
				'reason' => 'Invalid transaction'
			];
		}
	}

	public function runTransactionVerification($ref){

		$result = array();
		//The parameter after verify/ is the transaction reference to be verified
		$url = 'https://api.paystack.co/transaction/verify/'.$ref;

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt(
		  $ch, CURLOPT_HTTPHEADER, [
		    'Authorization: Bearer '.Transaction::$PYS_PRV_KEY]
		);
		$request = curl_exec($ch);
		curl_close($ch);

		if ($request) {
		    $result = json_decode($request, true);
		    // print_r($result);
		    if($result['status'] == false){
		    	return [
	        		'success' => false,
	        		'reason' => 'Transaction not found'
        		];
		    }
		    if($result){
		      if($result['data']){
		        //something came in

		        $data = $result['data'];

		        $chargeAmount = $data['amount'];

		        $meta = $data['metadata']['custom_fields'];

		        $type = $meta[0]['value'];

		        $tx_id = $meta[1]['value'];

		        $months = 0;
		        $status = $data['status'] == 'success' ? 2 : 3;

		        if($type == 'sub'){

		        	$plan = SubscriptionPlan::find($tx_id);

		        	$months = (int)$meta[2]['value'];

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
			        if($data['status'] == 'success' && ((string)$chargeAmount == (string)$amount)){
			          // the transaction was successful, you can deliver value
			          /* 
			          @ also remember that if this was a card transaction, you can store the 
			          @ card authorization to enable you charge the customer subsequently. 
			          @ The card authorization is in: 
			          @ $result['data']['authorization']['authorization_code'];
			          @ PS: Store the authorization with this email address used for this transaction. 
			          @ The authorization will only work with this particular email.
			          @ If the user changes his email on your system, it will be unusable
			          */


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
			        }else{
			          // the transaction was not successful, do not deliver value'
			          // print_r($result);  //uncomment this line to inspect the result, to check why it failed.

			        	$this->storeTransaction($ref, $chargeAmount, $narr, $status);

			            return [
			            	'success' => false,
			            	'reason' => "Invalid transaction contact support with the ref number: $ref"
			            ];
			        }
		        }

		      }else{
		        // echo $result['message'];
		        $this->storeTransaction($ref, $chargeAmount, $narr, $status);

        		return [
	            	'success' => false,
	            	'reason' => "Sorry something went wrong, contact support with the ref number: $ref"
	            ];

		      }

		    }else{
		      //print_r($result);
		    	$this->storeTransaction($ref, $chargeAmount, $narr, $status);

		        return [
	            	'success' => false,
	            	'reason' => "Sorry something went wrong, contact support with the ref number: $ref"
	            ];
		      
		    }
		  }else{
		    //var_dump($request);
		    	$this->storeTransaction($ref, $chargeAmount, $narr, $status);

		   		return [
	            	'success' => false,
	            	'reason' => "Sorry something went wrong, contact support with the ref number: $ref"
	            ];
		  }

	}

	public function runTransactionVerificationX($ref)
	{
		// $ref = $_GET['txref'];
        // $amount = ""; //Correct Amount from Server
        // $currency = ""; //Correct Currency from Server



        $query = array(
            "SECKEY" => Transaction::$PYS_PRV_KEY,
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
	        $status = $resp['data']['status'] == 'successful' ? 2 : 3;

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
		$user = Auth::user();
		// store the transactions in the database
		$user->transactions()->create(['reference' => $ref, 'amount' => $amount, 'narration' => $narr, 'status' => $status]);

		$subject = "Transaction ";
		$subject .= $status == 2 ? "successful" : "failed";

		$body = "Your ".$narr." in the total sum of $".$amount." was ";
		$body .= $status == 2 ? "successful" : "not successful";

		$user->notify(new UserNotification([
			"subject" => $subject,
			"body" => $body,
			"action" => [
				"text" => "View transactions",
				"url" => "/transactions"
			]
		]));
	}
}