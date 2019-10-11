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

use App\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubscriptionController extends Controller
{


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'id' => ['required','numeric', 'max:255'],
        ]);
    }




    function showSubscriptions()
    {
        $plans = SubscriptionPlan::all()->toArray();

        return view('subscriptions')->with(['plans'=> $plans]);

    }




    function subscribeUser(Request $request,$planId,SubscriptionPlan $plan,Subscription $Subscriber)
    {
        $checkPlanId = $this->validator(['id' => $planId]);

        if(!$checkPlanId->fails())
      {
            //get user details

            $planDetails = $plan->checkPlan($planId);
            //dd($planDetails['status']);
            if($planDetails['status'])
            {
               //subscribe user to plan selected

                //check for user plan and delete and update
                //or if there is no plan insert

                //main logic present in Subscription model
                $subscribeUserToPlan = $Subscriber->subscribeToPlan($planDetails['data']['id'],auth()->user()->toArray()['id']);

                if( $subscribeUserToPlan)
                {
                    return redirect('/users/subscriptions')->with(['editStatus'=>'User subscribed to ', 'plan'=> str_replace("_"," " ,ucfirst($planDetails['data']['name']))]);

                }
                else {
                    return redirect('/users/subscriptions')->with(['editErrors'=>'Plan subscription not successful']);

                }


            }
            else {
               return redirect('/users/subscriptions')->with(['editErrors'=>'Plan subscription not successful']);

            }

      }
      else
      {
          $errorsArray = $checkPlanId->errors()->all();
          $errorString = '';

          //pass in a ponter of the $errorString
          array_map(function($value)use(&$errorString)
          {
            $errorString .= $value;
          },$errorsArray);

        return redirect('/users/subscriptions')->with('editErrors',$errorString);

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
