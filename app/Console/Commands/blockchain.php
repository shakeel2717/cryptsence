<?php

namespace App\Console\Commands;

use App\Models\Transaction;
use App\Models\UserPlan;
use Illuminate\Console\Command;

class blockchain extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'blockchain:run';

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
        // getting all user who have plans
        $userPlans = UserPlan::where('status', 'active')->get();
        foreach ($userPlans as $userPlan) {
            $calc = $userPlan->plan->profit / 100;
            $durationCalculation = $userPlan->plan->price * $calc;
            $durationLeft = $durationCalculation / $userPlan->plan->duration;
            $monthLeft = $durationLeft / 30;

            // checking if this ROI already Inserted
            $transaction = Transaction::where('user_id', $userPlan->user_id)
                ->where('type', 'daily roi')
                ->where('reference', $userPlan->plan->name)
                ->where('amount', $monthLeft)
                ->get();
            if ($transaction->count() > 0) {
                goto endThisUser;
            }


            $transaction = new Transaction();
            $transaction->user_id = $userPlan->user_id;
            $transaction->type =  'daily roi';
            $transaction->amount =  $monthLeft;
            $transaction->status =  'approved';
            $transaction->sum =  'in';
            $transaction->reference =  $userPlan->plan->name;
            $transaction->save();
            endThisUser:
        }
        return 0;
    }
}
