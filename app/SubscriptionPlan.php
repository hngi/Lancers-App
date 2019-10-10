<?php
/**
 * @author Mofehintolu MUMUNI
 * 
 * @description SubscriptionPlan  model that handles user subscriptions
 * @slack @Bits_and_Bytes
 * @copyright 2019
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class SubscriptionPlan extends Model
{
    //model for SubscriptionPlan table
    protected $table='SubscriptionPlan';

    function checkPlan($planId)
    {
        $plan = SubscriptionPlan::find($planId);
       
        if($plan)
        { 
            return ['status' => true,'data'=> $plan->toArray()];
        }
        else {
            return ['status' => false,'data'=> []];
        }
    }
}
