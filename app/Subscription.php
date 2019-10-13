<?php
/**
 * @author Mofehintolu MUMUNI
 * 
 * @description Subscription model that handles user subscriptions
 * @slack @Bits_and_Bytes
 * @copyright 2019
 */
namespace App;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Subscription extends Model
{
    protected $fillable = [
        'user_id', 'plan_id', 'startdate', 'enddate',
    ];
    function subscribeToPlan($palnId , $userId, $months){
        $now = Carbon::now();
        $checkUserSubscribedPlan = Subscription::where('user_id',$userId)->first();
        if($checkUserSubscribedPlan != null){
           //update
           if($checkUserSubscribedPlan->toArray()['plan_id'] == $palnId){
                $endDate = explode("-", $checkUserSubscribedPlan->toArray()['enddate']);
                
                if($palnId == 1){
                    // return session value here
                    return "You are already subscribed to the starter plan for 1 year";
                }
                // return $checkUserSubscribedPlan !== null;
                $dt = Carbon::createMidnightDate($endDate[0],$endDate[1],$endDate[2]);
                if($dt->isPast()){                   
                    //handle date past get new start and end dates
                    $checkUserSubscribedPlan->startdate = $this->formatDate($now);
                    $checkUserSubscribedPlan->enddate = $this->formatDate($now->addMonths($months));
                    $checkUserSubscribedPlan->save();
         
                }else{
                    // for past date
                    $checkUserSubscribedPlan->enddate = $this->formatDate($dt->addMonths($months));
                    $checkUserSubscribedPlan->save();
                }
                return $checkUserSubscribedPlan !== null;  
           
            }
            else {
                  //save new plan, new start and end dates
                $checkUserSubscribedPlan->plan_id = $palnId;
                $checkUserSubscribedPlan->startdate = $this->formatDate($now);
                $checkUserSubscribedPlan->enddate = $this->formatDate($now->addMonths($months));
                
                $checkUserSubscribedPlan->save();
                return $checkUserSubscribedPlan !== null;
            }     
           
        }
        else {
           $newUserSub = Subscription::create(['user_id' => $userId, 'plan_id' => $palnId, 'startdate' => $this->formatDate($now), 'enddate' => $this->formatDate($now->addMonths($months))]);
            return $newUserSub !== null;   
        }
    }
    function formatDate(Carbon $date)
    {
        $plainDate = explode(" " ,$date->toArray()['formatted'])[0];
        return $plainDate;
    }
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function subscriptionPlan()
    {
        return $this->hasOne('App\SubscriptionPlan', 'id','plan_id');
    }
}