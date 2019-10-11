<?php

namespace App\Console\Commands;

use App\Currency;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class AddDataToCurrencyTable extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'currencies:table';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add currency data to the table';

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
        $path = base_path() . "/resources/json/currencies.json";
        $file = File::get($path);
        $currencies =  json_decode($file, true );


        echo "emptying table >> \n";
        Currency::truncate();

        foreach ($currencies as $currency) {
            Currency::create($currency);
        }

        echo "done ✓";
    }
}
