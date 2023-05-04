<?php

namespace App\Console\Commands;

use App\NewProject;
use App\Property;
use App\WantToBuyRent;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class W2BExpired extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'w2bExpire:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return int
     */
    public function handle()
    {
        WantToBuyRent::where('created_at', '<', Carbon::now()->subYear())->update(['status' => 0]);
        NewProject::where('created_at', '<', Carbon::now()->subYear())->update(['status' => 0]);
        Property::where('created_at', '<', Carbon::now()->subYear())->update(['status' => 0]);
        $this->info('Success');
    }
}
