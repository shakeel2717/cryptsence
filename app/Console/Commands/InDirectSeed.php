<?php

namespace App\Console\Commands;

use App\Models\InDirectAward;
use Illuminate\Console\Command;

class InDirectSeed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:indirect';

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
        // In-Direct Award
        $inDirectAward = new InDirectAward();
        $inDirectAward->name = "Squire";
        $inDirectAward->business_from = 5000;
        $inDirectAward->business_to = 9999;
        $inDirectAward->award = 50;
        $inDirectAward->save();

        $inDirectAward = new InDirectAward();
        $inDirectAward->name = "Executor";
        $inDirectAward->business_from = 10000;
        $inDirectAward->business_to = 24999;
        $inDirectAward->award = 200;
        $inDirectAward->save();


        $inDirectAward = new InDirectAward();
        $inDirectAward->name = "High Minister";
        $inDirectAward->business_from = 25000;
        $inDirectAward->business_to = 49999;
        $inDirectAward->award = 500;
        $inDirectAward->save();


        $inDirectAward = new InDirectAward();
        $inDirectAward->name = "Royal Paladin";
        $inDirectAward->business_from = 50000;
        $inDirectAward->business_to = 99999;
        $inDirectAward->award = 1000;
        $inDirectAward->save();


        $inDirectAward = new InDirectAward();
        $inDirectAward->name = "Regent";
        $inDirectAward->business_from = 100000;
        $inDirectAward->business_to = 249999;
        $inDirectAward->award = 3000;
        $inDirectAward->save();


        $inDirectAward = new InDirectAward();
        $inDirectAward->name = "Ambassador";
        $inDirectAward->business_from = 250000;
        $inDirectAward->business_to = 49999999;
        $inDirectAward->award = 10000;
        $inDirectAward->save();
        return 0;
    }
}
