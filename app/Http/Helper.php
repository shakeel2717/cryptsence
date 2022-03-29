<?php
// generating 6 digit unique user code

use App\Models\directAward;
use App\Models\InDirectAward;
use App\Models\Transaction;
use App\Models\User;
use App\Models\user\RoiTransaction;
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
    $inDirectCommission1 = Transaction::where('user_id', $user_id)->where('type', 'INDIRECT COMMISSION L1')->sum('amount');
    return $inDirectCommission1;
}


function inDirectCommission2($user_id)
{
    $inDirectCommission2 = Transaction::where('user_id', $user_id)->where('type', 'INDIRECT COMMISSION L2')->sum('amount');
    return $inDirectCommission2;
}

function inDirectCommission3($user_id)
{
    $inDirectCommission3 = Transaction::where('user_id', $user_id)->where('type', 'INDIRECT COMMISSION L3')->sum('amount');
    return $inDirectCommission3;
}

function inDirectCommission4($user_id)
{
    $inDirectCommission4 = Transaction::where('user_id', $user_id)->where('type', 'INDIRECT COMMISSION L4')->sum('amount');
    return $inDirectCommission4;
}

function inDirectCommission5($user_id)
{
    $inDirectCommission5 = Transaction::where('user_id', $user_id)->where('type', 'INDIRECT COMMISSION L5')->sum('amount');
    return $inDirectCommission5;
}

function inDirectCommission6($user_id)
{
    $inDirectCommission6 = Transaction::where('user_id', $user_id)->where('type', 'INDIRECT COMMISSION L6')->sum('amount');
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


function directBusinessAward($user_id)
{
    $transaction = Transaction::where('user_id', $user_id)->where('type', 'direct business award')->sum('amount');
    return $transaction;
}

function InDirectBusinessAward($user_id)
{
    $transaction = Transaction::where('user_id', $user_id)->where('type', 'InDirect 1 business award')->sum('amount');
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
    $directBusiness = directBusiness($user_id);
    // checking business between directReward Model
    if ($directBusiness == 0) {
        return "No Reward";
    }
    $directReward = directAward::where('business_from', '<=', $directBusiness)->where('business_to', '>=', $directBusiness)->latest()->first();
    if ($directReward == null) {
        return "No Reward";
    }
    if (myPlan($user_id) < 1) {
        return "No Reward";
    }
    return $directReward->name;
}


function inDirectAward($user_id)
{
    $user = User::find($user_id);
    $inDirectBusiness = inDirectBusiness($user_id);
    // checking business between directReward Model
    if ($inDirectBusiness == 0) {
        return "No Reward";
    }
    Log::info(inDirectBusiness($user_id));
    $directReward = InDirectAward::where('business_from', '<=', $inDirectBusiness)->where('business_to', '>=', $inDirectBusiness)->latest()->first();
    if ($directReward == null) {
        return "No Reward";
    }
    if (myPlan($user_id) < 1) {
        return "No Reward";
    }
    return $directReward->name;
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
    foreach ($refers as $refer) {
        $referDetail = User::find($refer->id);
        // checking if this is a Pin Account
        if ($referDetail->network != 1) {
            if ($referDetail->sale == 1) {
                $planInvests = UserPlan::where('user_id', $referDetail->id)->get();
                foreach ($planInvests as $planInvest) {
                    $directBusiness += $planInvest->plan->price;
                }
            }
        }
    }
    return $directBusiness;
}


function inDirectBusiness($user_id)
{
    $user = User::find($user_id);
    if ($user == null) {
        return 0;
    }
    // checking business in downline
    $inDirectBusiness = 0;
    $refers = User::where('refer', $user->username)->get();
    foreach ($refers as $refer) {
        $refers = User::where('refer', $refer->username)->get();
        foreach ($refers as $refer) {
            $referDetail = User::find($refer->id);
            // checking if this is a Pin Account
            if ($referDetail->network != 1) {
                if ($referDetail->sale == 1) {
                    $planInvests = UserPlan::where('user_id', $referDetail->id)->get();
                    foreach ($planInvests as $planInvest) {
                        $inDirectBusiness += $planInvest->plan->price;
                        $refers = User::where('refer', $refer->username)->get();
                        foreach ($refers as $refer) {
                            $referDetail = User::find($refer->id);
                            // checking if this is a Pin Account
                            if ($referDetail->network != 1) {
                                if ($referDetail->sale == 1) {
                                    $planInvests = UserPlan::where('user_id', $referDetail->id)->get();
                                    foreach ($planInvests as $planInvest) {
                                        $inDirectBusiness += $planInvest->plan->price;
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
    return $inDirectBusiness;
}







function myPlan($user_id)
{
    $user = User::findOrFail($user_id);
    if ($user == null) {
        return 0;
    }
    // checking if this is a Pin Account
    if ($user->network == 1) {
        return "0";
    }
    $userPlans = UserPlan::where('user_id', $user_id)->where('status', 'active')->get();
    $invest = 0;
    foreach ($userPlans as $userPlan) {
        $invest += $userPlan->plan->price;
    }
    // checking business in downline
    return $invest;
}

function myPlanCount($user_id)
{
    $user = User::findOrFail($user_id);
    if ($user == null) {
        return 0;
    }

    $userPlans = UserPlan::where('user_id', $user_id)->where('status', 'active')->get();
    $invest = 0;
    foreach ($userPlans as $userPlan) {
        $invest += $userPlan->plan->price;
    }
    // checking business in downline
    return $invest;
}


function networkCap($user_id)
{
    $totalCap = directCommission($user_id) + inDirectTotalCommission($user_id) + passive($user_id) + directBusinessAward($user_id);
    return $totalCap;
}


function networkCapProgress($user_id)
{
    $security = myPlanCount($user_id) * 7; // 7000
    $cap = networkCap($user_id); // 8000
    if ($security < 1) {
        return 1;
    }
    if ($cap < 1) {
        return 1;
    }
    // get percentage
    $percentage = ($cap / $security) * 100;
    if ($percentage > 100) {
        return 100;
    }
    return number_format($percentage);
}

function roiBalance($user_id)
{
    $in = RoiTransaction::where('user_id', $user_id)->where('sum', 'in')->sum('amount');
    $out = RoiTransaction::where('user_id', $user_id)->where('sum', 'out')->sum('amount');
    return $in - $out;
}


function totalRoiBalanceIn($user_id)
{
    $in = RoiTransaction::where('user_id', $user_id)->where('sum', 'in')->sum('amount');
    return $in;
}


function IndirectBusinessL1($user_id)
{
    $user = User::find($user_id);
    if ($user == null) {
        return 0;
    }
    // checking business in downline
    $inDirectBusiness = 0;
    $refers = User::where('refer', $user->username)->get();
    foreach ($refers as $refer) {
        $refers = User::where('refer', $refer->username)->get();
        foreach ($refers as $refer) {
            $referDetail = User::find($refer->id);
            // checking if this is a Pin Account
            if ($referDetail->network != 1) {
                if ($referDetail->sale == 1) {
                    $planInvests = UserPlan::where('user_id', $referDetail->id)->get();
                    foreach ($planInvests as $planInvest) {
                        $inDirectBusiness += $planInvest->plan->price;
                    }
                }
            }
        }
    }
    return $inDirectBusiness;
}



function IndirectBusinessL2($user_id)
{
    $user = User::find($user_id);
    if ($user == null) {
        return 0;
    }
    // checking business in downline
    $inDirectBusiness = 0;
    $refers = User::where('refer', $user->username)->get();
    foreach ($refers as $refer) {
        $refers = User::where('refer', $refer->username)->get();
        foreach ($refers as $refer) {
            $referDetail = User::find($refer->id);
            // checking if this is a Pin Account
            // if ($referDetail->network != 1) {
            //     if ($referDetail->sale == 1) {
                    $planInvests = UserPlan::where('user_id', $referDetail->id)->get();
                    foreach ($planInvests as $planInvest) {
                        $refers = User::where('refer', $refer->username)->get();
                        foreach ($refers as $refer) {
                            $referDetail = User::find($refer->id);
                            // checking if this is a Pin Account
                            if ($referDetail->network != 1) {
                                if ($referDetail->sale == 1) {
                                    $planInvests = UserPlan::where('user_id', $referDetail->id)->get();
                                    foreach ($planInvests as $planInvest) {
                                        $inDirectBusiness += $planInvest->plan->price;
                                    }
                                }
                            }
                        }
                    }
            //     }
            // }
        }
    }
    return $inDirectBusiness;
}


// 3rd level business
function IndirectBusinessL3($user_id)
{
    $user = User::find($user_id);
    if ($user == null) {
        return 0;
    }
    // checking business in downline
    $inDirectBusiness = 0;
    $refers = User::where('refer', $user->username)->get();
    foreach ($refers as $refer) {
        $refers = User::where('refer', $refer->username)->get();
        foreach ($refers as $refer) {
            $referDetail = User::find($refer->id);
            // checking if this is a Pin Account
            // if ($referDetail->network != 1) {
            //     if ($referDetail->sale == 1) {
                    $planInvests = UserPlan::where('user_id', $referDetail->id)->get();
                    foreach ($planInvests as $planInvest) {
                        $refers = User::where('refer', $refer->username)->get();
                        foreach ($refers as $refer) {
                            $referDetail = User::find($refer->id);
                            // checking if this is a Pin Account
                            // if ($referDetail->network != 1) {
                            //     if ($referDetail->sale == 1) {
                                    $planInvests = UserPlan::where('user_id', $referDetail->id)->get();
                                    foreach ($planInvests as $planInvest) {
                                        // $inDirectBusiness += $planInvest->plan->price;
                                        $refers = User::where('refer', $refer->username)->get();
                                        foreach ($refers as $refer) {
                                            $referDetail = User::find($refer->id);
                                            // checking if this is a Pin Account
                                            if ($referDetail->network != 1) {
                                                if ($referDetail->sale == 1) {
                                                    $planInvests = UserPlan::where('user_id', $referDetail->id)->get();
                                                    foreach ($planInvests as $planInvest) {
                                                        $inDirectBusiness += $planInvest->plan->price;
                                                    }
                                                }
                                            }
                                        }
                                    }
                            //     }
                            // }
                        }
                    }
            //     }
            // }
        }
    }
    return $inDirectBusiness;
}

function IndirectBusinessL4($user_id)
{
    $user = User::find($user_id);
    if ($user == null) {
        return 0;
    }
    // checking business in downline
    $inDirectBusiness = 0;
    $refers = User::where('refer', $user->username)->get();
    foreach ($refers as $refer) {
        $refers = User::where('refer', $refer->username)->get();
        foreach ($refers as $refer) {
            $referDetail = User::find($refer->id);
            // checking if this is a Pin Account
            // if ($referDetail->network != 1) {
            //     if ($referDetail->sale == 1) {
                    $planInvests = UserPlan::where('user_id', $referDetail->id)->get();
                    foreach ($planInvests as $planInvest) {
                        $refers = User::where('refer', $refer->username)->get();
                        foreach ($refers as $refer) {
                            $referDetail = User::find($refer->id);
                            // checking if this is a Pin Account
                            // if ($referDetail->network != 1) {
                            //     if ($referDetail->sale == 1) {
                                    $planInvests = UserPlan::where('user_id', $referDetail->id)->get();
                                    foreach ($planInvests as $planInvest) {
                                        // $inDirectBusiness += $planInvest->plan->price;
                                        $refers = User::where('refer', $refer->username)->get();
                                        foreach ($refers as $refer) {
                                            $referDetail = User::find($refer->id);
                                            // checking if this is a Pin Account
                                            // if ($referDetail->network != 1) {
                                            //     if ($referDetail->sale == 1) {
                                                    $planInvests = UserPlan::where('user_id', $referDetail->id)->get();
                                                    foreach ($planInvests as $planInvest) {
                                                        // $inDirectBusiness += $planInvest->plan->price;
                                                        $refers = User::where('refer', $refer->username)->get();
                                                        foreach ($refers as $refer) {
                                                            $referDetail = User::find($refer->id);
                                                            // checking if this is a Pin Account
                                                            if ($referDetail->network != 1) {
                                                                if ($referDetail->sale == 1) {
                                                                    $planInvests = UserPlan::where('user_id', $referDetail->id)->get();
                                                                    foreach ($planInvests as $planInvest) {
                                                                        $inDirectBusiness += $planInvest->plan->price;
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                            //     }
                                            // }
                                        }
                                    }
                            //     }
                            // }
                        }
                    }
            //     }
            // }
        }
    }
    return $inDirectBusiness;
}

function IndirectBusinessL5($user_id)
{
    $user = User::find($user_id);
    if ($user == null) {
        return 0;
    }
    // checking business in downline
    $inDirectBusiness = 0;
    $refers = User::where('refer', $user->username)->get();
    foreach ($refers as $refer) {
        $refers = User::where('refer', $refer->username)->get();
        foreach ($refers as $refer) {
            $referDetail = User::find($refer->id);
            // checking if this is a Pin Account
            // if ($referDetail->network != 1) {
            //     if ($referDetail->sale == 1) {
                    $planInvests = UserPlan::where('user_id', $referDetail->id)->get();
                    foreach ($planInvests as $planInvest) {
                        $refers = User::where('refer', $refer->username)->get();
                        foreach ($refers as $refer) {
                            $referDetail = User::find($refer->id);
                            // checking if this is a Pin Account
                            // if ($referDetail->network != 1) {
                            //     if ($referDetail->sale == 1) {
                                    $planInvests = UserPlan::where('user_id', $referDetail->id)->get();
                                    foreach ($planInvests as $planInvest) {
                                        // $inDirectBusiness += $planInvest->plan->price;
                                        $refers = User::where('refer', $refer->username)->get();
                                        foreach ($refers as $refer) {
                                            $referDetail = User::find($refer->id);
                                            // checking if this is a Pin Account
                                            // if ($referDetail->network != 1) {
                                            //     if ($referDetail->sale == 1) {
                                                    $planInvests = UserPlan::where('user_id', $referDetail->id)->get();
                                                    foreach ($planInvests as $planInvest) {
                                                        // $inDirectBusiness += $planInvest->plan->price;
                                                        $refers = User::where('refer', $refer->username)->get();
                                                        foreach ($refers as $refer) {
                                                            $referDetail = User::find($refer->id);
                                                            // checking if this is a Pin Account
                                                            // if ($referDetail->network != 1) {
                                                            //     if ($referDetail->sale == 1) {
                                                                    $planInvests = UserPlan::where('user_id', $referDetail->id)->get();
                                                                    foreach ($planInvests as $planInvest) {
                                                                        // $inDirectBusiness += $planInvest->plan->price;
                                                                        $refers = User::where('refer', $refer->username)->get();
                                                                        foreach ($refers as $refer) {
                                                                            $referDetail = User::find($refer->id);
                                                                            // checking if this is a Pin Account
                                                                            if ($referDetail->network != 1) {
                                                                                if ($referDetail->sale == 1) {
                                                                                    $planInvests = UserPlan::where('user_id', $referDetail->id)->get();
                                                                                    foreach ($planInvests as $planInvest) {
                                                                                        $inDirectBusiness += $planInvest->plan->price;
                                                                                    }
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                            //     }
                                                            // }
                                                        }
                                                    }
                                            //     }
                                            // }
                                        }
                                    }
                            //     }
                            // }
                        }
                    }
            //     }
            // }
        }
    }
    return $inDirectBusiness;
}

function IndirectBusinessL6($user_id)
{
    $user = User::find($user_id);
    if ($user == null) {
        return 0;
    }
    // checking business in downline
    $inDirectBusiness = 0;
    $refers = User::where('refer', $user->username)->get();
    foreach ($refers as $refer) {
        $refers = User::where('refer', $refer->username)->get();
        foreach ($refers as $refer) {
            $referDetail = User::find($refer->id);
            // checking if this is a Pin Account
            // if ($referDetail->network != 1) {
            //     if ($referDetail->sale == 1) {
                    $planInvests = UserPlan::where('user_id', $referDetail->id)->get();
                    foreach ($planInvests as $planInvest) {
                        $refers = User::where('refer', $refer->username)->get();
                        foreach ($refers as $refer) {
                            $referDetail = User::find($refer->id);
                            // checking if this is a Pin Account
                            // if ($referDetail->network != 1) {
                            //     if ($referDetail->sale == 1) {
                                    $planInvests = UserPlan::where('user_id', $referDetail->id)->get();
                                    foreach ($planInvests as $planInvest) {
                                        // $inDirectBusiness += $planInvest->plan->price;
                                        $refers = User::where('refer', $refer->username)->get();
                                        foreach ($refers as $refer) {
                                            $referDetail = User::find($refer->id);
                                            // checking if this is a Pin Account
                                            // if ($referDetail->network != 1) {
                                            //     if ($referDetail->sale == 1) {
                                                    $planInvests = UserPlan::where('user_id', $referDetail->id)->get();
                                                    foreach ($planInvests as $planInvest) {
                                                        // $inDirectBusiness += $planInvest->plan->price;
                                                        $refers = User::where('refer', $refer->username)->get();
                                                        foreach ($refers as $refer) {
                                                            $referDetail = User::find($refer->id);
                                                            // checking if this is a Pin Account
                                                            // if ($referDetail->network != 1) {
                                                            //     if ($referDetail->sale == 1) {
                                                                    $planInvests = UserPlan::where('user_id', $referDetail->id)->get();
                                                                    foreach ($planInvests as $planInvest) {
                                                                        // $inDirectBusiness += $planInvest->plan->price;
                                                                        $refers = User::where('refer', $refer->username)->get();
                                                                        foreach ($refers as $refer) {
                                                                            $referDetail = User::find($refer->id);
                                                                            // checking if this is a Pin Account
                                                                            // if ($referDetail->network != 1) {
                                                                            //     if ($referDetail->sale == 1) {
                                                                                    $planInvests = UserPlan::where('user_id', $referDetail->id)->get();
                                                                                    foreach ($planInvests as $planInvest) {
                                                                                        // $inDirectBusiness += $planInvest->plan->price;
                                                                                        $refers = User::where('refer', $refer->username)->get();
                                                                                        foreach ($refers as $refer) {
                                                                                            $referDetail = User::find($refer->id);
                                                                                            // checking if this is a Pin Account
                                                                                            if ($referDetail->network != 1) {
                                                                                                if ($referDetail->sale == 1) {
                                                                                                    $planInvests = UserPlan::where('user_id', $referDetail->id)->get();
                                                                                                    foreach ($planInvests as $planInvest) {
                                                                                                        $inDirectBusiness += $planInvest->plan->price;
                                                                                                    }
                                                                                                }
                                                                                            }
                                                                                        }
                                                                                    }
                                                                            //     }
                                                                            // }
                                                                        }
                                                                    }
                                                            //     }
                                                            // }
                                                        }
                                                    }
                                            //     }
                                            // }
                                        }
                                    }
                            //     }
                            // }
                        }
                    }
            //     }
            // }
        }
    }
    return $inDirectBusiness;
}

function totalIndirectBusiness($user_id){
    IndirectBusinessL1($user_id) + IndirectBusinessL2($user_id) + IndirectBusinessL3($user_id) + IndirectBusinessL4($user_id) + IndirectBusinessL5($user_id) + IndirectBusinessL6($user_id);
}



function coinPaymentDeposit()
{
    // getting only pure investment
    $transaction = Transaction::where('type', 'deposit')->where('reference', 'coinPayment Gateway')->sum('amount');
    return $transaction;
}


function adminDeposit()
{
    // getting only pure investment
    $transaction = Transaction::where('type', 'deposit')->where('reference', 'Binance Gateway')->sum('amount');
    return $transaction;
}

// Networker Investment
function networkPinInvest()
{
    $userPlan = UserPlan::where('status', 'active')->get();
    $netInvest = 0;
    foreach ($userPlan as $userPlan) {
        // checking if this user is a Pin Account
        if ($userPlan->user->network == 1) {
            $netInvest += $userPlan->plan->price;
        }
    }
    return $netInvest;
}

// ROI Stopped Investment
function roiStoppedInvest()
{
    $userPlan = UserPlan::where('status', 'active')->get();
    $netInvest = 0;
    foreach ($userPlan as $userPlan) {
        // checking if this user is a Pin Account
        if ($userPlan->user->roi == 0) {
            $netInvest += $userPlan->plan->price;
        }
    }
    return $netInvest;
}


// passive Stopped Investment
function passiveStoppedInvest()
{
    $userPlan = UserPlan::where('status', 'active')->get();
    $netInvest = 0;
    foreach ($userPlan as $userPlan) {
        // checking if this user is a Pin Account
        if ($userPlan->user->passive == 0) {
            $netInvest += $userPlan->plan->price;
        }
    }
    return $netInvest;
}


// sale Stopped Investment
function saleStoppedInvest()
{
    $userPlan = UserPlan::where('status', 'active')->get();
    $netInvest = 0;
    foreach ($userPlan as $userPlan) {
        // checking if this user is a Pin Account
        if ($userPlan->user->sale == 0) {
            $netInvest += $userPlan->plan->price;
        }
    }
    return $netInvest;
}

function totalPureInvestment()
{
    $userPlan = UserPlan::where('status', 'active')->get();
    $netInvest = 0;
    foreach ($userPlan as $userPlan) {
        // checking if this user is a Pin Account
        if ($userPlan->user->sale != 0 && $userPlan->user->passive != 0 && $userPlan->user->roi != 0 && $userPlan->user->network != 1) {
            $netInvest += $userPlan->plan->price;
        }
    }
    return $netInvest;
}


