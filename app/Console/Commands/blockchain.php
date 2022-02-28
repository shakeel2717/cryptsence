<?php

namespace App\Console\Commands;

use App\Models\passive;
use App\Models\Transaction;
use App\Models\User;
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

            // checking if this user is netowrk Pin
            $user = User::find($userPlan->user_id);
            if ($user->network == 1) {
                goto endThisUser;
            }


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

            // Passive Income upto 2 levels
            // checking if this user has valid refer
            if ($user->refer != 'default') {
                $user = User::where('username', $user->refer)->first();
                if ($user) {
                    $passive = passive::where('level', 'Direct')->first();
                    if ($passive) {
                        $directPassive = $monthLeft * $passive->value / 100;
                        $transaction = new Transaction();
                        $transaction->user_id = $user->id;
                        $transaction->type =  'passive income 1';
                        $transaction->amount =  $directPassive;
                        $transaction->status =  'approved';
                        $transaction->sum =  'in';
                        $transaction->reference =  $userPlan->user->username;
                        $transaction->save();

                        // checking if this user has valid refer
                        if ($user->refer != 'default') {
                            $user = User::where('username', $user->refer)->first();
                            if ($user) {
                                $passive = passive::where('level', 'Level 1')->first();
                                if ($passive) {
                                    $level1Passive = $monthLeft * $passive->value / 100;
                                    $transaction = new Transaction();
                                    $transaction->user_id = $user->id;
                                    $transaction->type =  'passive income 2';
                                    $transaction->amount =  $level1Passive;
                                    $transaction->status =  'approved';
                                    $transaction->sum =  'in';
                                    $transaction->reference =  $userPlan->user->username;
                                    $transaction->save();

                                    // checking if this user has valid refer
                                    if ($user->refer != 'default') {
                                        $user = User::where('username', $user->refer)->first();
                                        if ($user) {
                                            $passive = passive::where('level', 'Level 2')->first();
                                            if ($passive) {
                                                $level2Passive = $monthLeft * $passive->value / 100;
                                                $transaction = new Transaction();
                                                $transaction->user_id = $user->id;
                                                $transaction->type =  'passive income 3';
                                                $transaction->amount =  $level2Passive;
                                                $transaction->status =  'approved';
                                                $transaction->sum =  'in';
                                                $transaction->reference =  $userPlan->user->username;
                                                $transaction->save();
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
            endThisUser:
        }
        return 0;
    }
}
