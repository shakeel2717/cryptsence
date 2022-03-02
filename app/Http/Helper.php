<?php
// generating 6 digit unique user code

use App\Models\directAward;
use App\Models\Transaction;
use App\Models\User;
use App\Models\UserPlan;
use Illuminate\Support\Facades\Log;

function balance($user_id)
{
    $in = Transaction::where('user_id', $user_id)->where('sum', 'in')->sum('amount');
    $out = Transaction::where('user_id', $user_id)->where('sum', 'out')->sum('amount');
    return $in - $out;
}


function inBalance($user_id)
{
    $in = Transaction::where('user_id', $user_id)->where('sum', 'in')->where('type', '!=', 'deposit')->sum('amount');
    return $in;
}

function withdraw($user_id)
{
    $withdraw = Transaction::where('user_id', $user_id)->where('type', 'withdraw')->sum('amount');
    return $withdraw;
}


function directCommission($user_id)
{
    $directCommission = Transaction::where('user_id', $user_id)->where('type', 'direct commission')->sum('amount');
    return $directCommission;
}


function inDirectCommission1($user_id)
{
    $inDirectCommission1 = Transaction::where('user_id', $user_id)->where('type', 'indirect commission 1')->sum('amount');
    return $inDirectCommission1;
}


function inDirectCommission2($user_id)
{
    $inDirectCommission2 = Transaction::where('user_id', $user_id)->where('type', 'indirect commission 2')->sum('amount');
    return $inDirectCommission2;
}

function inDirectCommission3($user_id)
{
    $inDirectCommission3 = Transaction::where('user_id', $user_id)->where('type', 'indirect commission 3')->sum('amount');
    return $inDirectCommission3;
}

function inDirectCommission4($user_id)
{
    $inDirectCommission4 = Transaction::where('user_id', $user_id)->where('type', 'indirect commission 4')->sum('amount');
    return $inDirectCommission4;
}

function inDirectCommission5($user_id)
{
    $inDirectCommission5 = Transaction::where('user_id', $user_id)->where('type', 'indirect commission 5')->sum('amount');
    return $inDirectCommission5;
}

function inDirectCommission6($user_id)
{
    $inDirectCommission6 = Transaction::where('user_id', $user_id)->where('type', 'indirect commission 6')->sum('amount');
    return $inDirectCommission6;
}

function inDirectTotalCommission($user_id)
{
    $total = inDirectCommission1($user_id) + inDirectCommission2($user_id) + inDirectCommission3($user_id) + inDirectCommission4($user_id) + inDirectCommission5($user_id) + inDirectCommission6($user_id);
    return $total;
}



function passive($user_id)
{
    $transaction = Transaction::where('user_id', $user_id)->where('type', 'like', 'passive income %')->sum('amount');
    return $transaction;
}


function totalRoi($user_id)
{
    $transaction = Transaction::where('user_id', $user_id)->where('type', 'daily roi')->sum('amount');
    return $transaction;
}

function edie($message)
{
    // store this message into log
    Log::info($message);
}


function directAward($user_id)
{
    $user = User::find($user_id);
    if ($user == null) {
        return "No Reward";
    }
    // checking business in downline
    $refers = User::where('refer', $user->username)->get();
    $directBusiness = 0;
    Log::info("Foreach Loop start");
    foreach ($refers as $refer) {
        Log::info($refer->username);
        $referDetail = User::find($refer->id);
        $planInvests = UserPlan::where('user_id', $referDetail->id)->get();
        foreach ($planInvests as $planInvest) {
            Log::info($planInvest->plan->price);
            $directBusiness += $planInvest->plan->price;
        }
    }
    // checking business between directReward Model
    $directReward = directAward::where('business_from', '>=', $directBusiness)->where('business_to', '<=', $directBusiness)->first();
    if ($directReward == null) {
        return "No Reward";
    }
    return $directReward;
}


function directBusiness($user_id)
{
    $user = User::find($user_id);
    if ($user == null) {
        return "No Reward";
    }
    // checking business in downline
    $refers = User::where('refer', $user->username)->get();
    $directBusiness = 0;
    Log::info("Foreach Loop start");
    foreach ($refers as $refer) {
        Log::info($refer->username);
        $referDetail = User::find($refer->id);
        $planInvests = UserPlan::where('user_id', $referDetail->id)->get();
        foreach ($planInvests as $planInvest) {
            Log::info($planInvest->plan->price);
            $directBusiness += $planInvest->plan->price;
        }
    }
    return $directBusiness;
}

function myPlan($user_id)
{
    $user = User::find($user_id);
    if ($user == null) {
        return "No Investment";
    }
    $userPlans = UserPlan::where('user_id', $user_id)->get();
    $invest = 0;
    foreach ($userPlans as $userPlan) {
        $invest += $userPlan->plan->price;
    }
    // checking business in downline
    return $invest;
}
