<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class MigrationsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'run:migrations';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Refreshes migrations and adds required data';

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
        Artisan::call('migrate:fresh');

        Artisan::call('subscriptions:table');
        Artisan::call('countriesandstates:table');
        Artisan::call('currencies:table');
        Artisan::call('passport:install');
    }
}
