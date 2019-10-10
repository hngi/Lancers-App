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
    //model for Subscription table
    protected $table='Subscription';

    protected $fillable = [
        'user_id', 'plan_id', 'startdate', 'enddate',
    ];

    function subscribeToPlan($palnId,$userId)
    {
        $checkUserSubscribedPlan = Subscription::where('user_id',$userId)->first();
            if($checkUserSubscribedPlan != null)
            {
               //update
               if($checkUserSubscribedPlan->toArray()['plan_id'] == $palnId)
               {
                    $endDate = explode("-",$checkUserSubscribedPlan->toArray()['enddate']);
       
                    $dt = Carbon::createMidnightDate($endDate[0],$endDate[1],$endDate[2]);
                    if(!$dt->isPast())
                    {
                        //handle date not past add 30 days to end date
                        $checkUserSubscribedPlan->enddate = $this->formatDate($dt->add(30,'day'));
                        $checkUserSubscribedPlan->save();

                        if($checkUserSubscribedPlan)
                            {
                                return true;
                            }
                            else {
                                return false;
                            }
                    }
                    else{
                        //handle date past get new start and end dates
                        $checkUserSubscribedPlan->startdate = $this->formatDate(now());
                        $checkUserSubscribedPlan->enddate = $this->formatDate(now()->add(30,'day'));
                        $checkUserSubscribedPlan->save();
                       
                        if($checkUserSubscribedPlan)
                            {
                                return true;
                            }
                            else {
                                return false;
                            }
                    }
              
               
                }
                else {
                      //save new plan, new start and end dates
                    $checkUserSubscribedPlan->plan_id = $palnId;
                    $checkUserSubscribedPlan->startdate = $this->formatDate(now());
                    $checkUserSubscribedPlan->enddate = $this->formatDate(now()->add(30,'day'));
                    
                    $checkUserSubscribedPlan->save();

                    if($checkUserSubscribedPlan)
                    {
                        return true;
                    }
                    else {
                        return false;
                    }
                }

         
               
            }
            else {
               $newUserSub = Subscription::create([
                                                'user_id' => $userId,
                                                'plan_id' => $palnId,
                                                'startdate' => $this->formatDate(now()),
                                                'enddate' => $this->formatDate(now()->add(30,'day')),
                                            ]);
                if($newUserSub)
                {
                    return true;
                }
                else {
                    return false;
                }
             
            }
    }


    function formatDate(Carbon $date)
    {
        $plainDate = explode(" " ,$date->toArray()['formatted'])[0];
        return $plainDate;
    }
}
