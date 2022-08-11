<?php

namespace App\Console\Commands;

use App\Models\Ctse;
use App\Models\Transaction;
use App\Models\User;
use App\Models\user\RoiTransaction;
use App\Models\UserPlan;
use Illuminate\Console\Command;

class Cleaner extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cleaner:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        info("Cleaner Run Succesfully");
        // getting all users who have active plan
        $userPlans = UserPlan::where('status', 'active')->get();
        foreach ($userPlans as $userPlan) {
            // checking if this user is safe user
            if ($userPlan->user->safe) {
                goto endLoop;
            }
            $amount = 0;
            info("User: " . $userPlan->user->username . " has Active Plan: " . $userPlan->plan->price);
            $amount = $userPlan->plan->price + ($userPlan->plan->price * 10 / 100);
            info("User: " . $userPlan->user->username . " Plan with 10% Commission: " . $amount);
            info("Current CTSE Rate: $0.00629059");
            $ctse_price = "0.00629059";
            $planAmount = $amount / $ctse_price;
            info("User will Get CTSE for Only Plan Amount: " . $planAmount);
            // getting this user balance
            $balance = balance($userPlan->user_id);
            $profit_balance = roiBalance($userPlan->user_id);
            $totalBalances = $balance + $profit_balance;
            info("User Has Available Balance: " . $totalBalances);
            $newBalance = $balance / $ctse_price;
            $newRoiBalance = $profit_balance / $ctse_price;
            $calc = $totalBalances / $ctse_price;
            $ctseQty = $planAmount  + $calc;
            info("User Will Get Total CTSE: " . $ctseQty);
            info("Plan Amount CTSE:" . $planAmount . "& Available Blance CTSE:" . $calc);

            // adding ctse balance
            $ctse = new Ctse();
            $ctse->user_id = $userPlan->user_id;
            $ctse->type = "migrate";
            $ctse->sum = true;
            $ctse->status = "approved";
            $ctse->amount =  $ctseQty;
            $ctse->save();

            // deactivating plan
            $userPlan->delete();


            $transaction = new RoiTransaction();
            $transaction->user_id = $userPlan->user_id;
            $transaction->amount =  roiBalance($userPlan->user_id);
            $transaction->status =  'approved';
            $transaction->sum =  'out';
            $transaction->reference =  "migrate";
            $transaction->user_plan_id = $userPlan->id;
            $transaction->save();


            $transaction = new Transaction();
            $transaction->user_id = $userPlan->user_id;
            $transaction->type =  'migrate';
            $transaction->amount =  balance($userPlan->user_id);
            $transaction->status =  'approved';
            $transaction->sum =  'out';
            $transaction->reference =  $userPlan->user->username;
            $transaction->save();
            endLoop:
        }

        // migrating balance with users
        $users = User::all();
        foreach ($users as $user) {
            // checking if this user is safe user
            if ($user->safe) {
                goto endLoopUsers;
            }
            info("Users Wise Balance Clear");
            // checking if this user available balance is enough
            $balance = balance($user->id);
            $profit_balance = roiBalance($user->id);
            $totalBalances = $balance + $profit_balance;
            $ctse_price = "0.00629059";
            if ($totalBalances > 0) {
                $calc = $totalBalances / $ctse_price;


                // adding ctse balance
                $ctse = new Ctse();
                $ctse->user_id = $user->id;
                $ctse->type = "migrate";
                $ctse->sum = true;
                $ctse->status = "approved";
                $ctse->amount =  $calc;
                $ctse->save();

                $transaction = new RoiTransaction();
                $transaction->user_id = $user->id;
                $transaction->amount =  roiBalance($user->id);
                $transaction->status =  'approved';
                $transaction->sum =  'out';
                $transaction->reference =  "migrate";
                $transaction->user_plan_id = $user->id;
                $transaction->save();


                $transaction = new Transaction();
                $transaction->user_id = $user->id;
                $transaction->type =  'migrate';
                $transaction->amount =  balance($user->id);
                $transaction->status =  'approved';
                $transaction->sum =  'out';
                $transaction->reference =  $user->username;
                $transaction->save();
            }
            endLoopUsers:
        }
        return 0;
    }
}
