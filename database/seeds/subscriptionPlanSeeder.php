<?php
/**
 * @author Mofehintolu MUMUNI
 * 
 * @description subscriptionPlanSeeder 
 * @slack @Bits_and_Bytes
 * @copyright 2019
 */
use App\SubscriptionPlan;
use Illuminate\Database\Seeder;


class subscriptionPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\SubscriptionPlan::class,1)->create();
    }
}
