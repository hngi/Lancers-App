<?php

namespace App\Console\Commands;

use App\SubscriptionPlan;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;


class AddDataToSubscriptionsTable extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'subscriptions:table';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fill in the neccessary data in the subscriptions table';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $path = base_path() . "/resources/json/subscriptionplans.json";
        $file = File::get($path);
        $plans =  json_decode($file, true );


        echo "Making sure table is empty >>\n";
        SubscriptionPlan::truncate();
        
        foreach ($plans as $plan) {
            echo "adding ". $plan['name'] ." to table\n";
            SubscriptionPlan::create($plan);
        }

        echo "done ✓";
    }
}
