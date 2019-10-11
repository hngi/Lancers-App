<?php
/**
 * @author Mofehintolu MUMUNI
 * 
 * @description Subscription controller that handles user subscriptions
 * @slack @Bits_and_Bytes
 * @copyright 2019
 */
namespace App\Http\Controllers;

use App\SubscriptionPlan;

use Auth;
use Carbon\Carbon;
use App\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Traits\VerifyandStoreTransactions;

class SubscriptionController extends Controller
{
    use VerifyandStoreTransactions;

    public function __construct(){
        $this->middleware('auth');
    }


    function showSubscriptions()
    {
        $plans = SubscriptionPlan::all()->toArray();
        return view('subscriptions')->with(['plans'=> $plans]);

    }

    function subscribeUser(Request $request, $txref = null, SubscriptionPlan $plan,Subscription $Subscriber)
    {
        if($txref !== null){
            $data = $this->verifyTransaction($txref);
        }else{
            $data = [
                'success' => true,
                'plan_id' => 1,
                'months' => 12
            ];
        }

        if(!$data['success']){
            return $data['reason'];
        }else{          
            $planId = $data['plan_id'];
            $months = $data['months'];

           
            $planDetails = $plan->checkPlan($planId);
            //dd($planDetails['status']);
            if($planDetails['status']){
               //subscribe user to plan selected

                //check for user plan and delete and update
                //or if there is no plan insert
                if($months < 1){
                    return redirect('/users/subscriptions')->with(['editErrors'=>'Subscription months must be at least 1']);
                }

                //main logic present in Subscription model
                $subscribeUserToPlan = $Subscriber->subscribeToPlan($planDetails['data']['id'], Auth::id(), $months);

                if( $subscribeUserToPlan) {
                    return redirect('/users/subscriptions')->with(['editStatus'=>'User subscribed to ', 'plan'=> str_replace("_"," " ,ucfirst($planDetails['data']['name']))]);       
                } else {
                    return redirect('/users/subscriptions')->with(['editErrors'=>'Plan subscription not successful']);
                }      
            } else {
               return redirect('/users/subscriptions')->with(['editErrors'=>'Plan subscription not successful']);
            }
        }

    }


    function showPlan()
    {
        $userDetails = auth()->user();
        $user_id = auth()->user()->toArray()['id'];
        $plan = Subscription::where('user_id',$user_id)->first();
        if($plan != null)
        {
            $planStartDate = $plan->toArray()['startdate'];
            $planEndDate = $plan->toArray()['enddate'];
            $userPlan = SubscriptionPlan::where('id',$plan->toArray()['plan_id'])->first();
          
            return view('userSubscription')->with(['plans'=> $userPlan->toArray(),'dates' => [$planStartDate,$planEndDate]]);
        }
        else {
            //no plan to show
            return view('userSubscription')->with(['plans'=> null,'dates' =>null]);
       
        }
    }
    
}
