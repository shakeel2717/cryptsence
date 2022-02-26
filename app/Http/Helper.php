<?php
// generating 6 digit unique user code

use App\Models\Transaction;
use App\Models\User;

function balance($user_id){
    $in = Transaction::where('user_id', $user_id)->where('sum','in')->sum('amount');
    $out = Transaction::where('user_id', $user_id)->where('sum','out')->sum('amount');
    return $in - $out;
}


function inBalance($user_id){
    $in = Transaction::where('user_id', $user_id)->where('sum','in')->where('type','!=','deposit')->sum('amount');
    return $in;
}

function withdraw($user_id){
    $withdraw = Transaction::where('user_id', $user_id)->where('type','withdraw')->sum('amount');
    return $withdraw;
}


function directCommission($user_id)
{
    $directCommission = Transaction::where('user_id', $user_id)->where('type','direct commission')->sum('amount');
    return $directCommission;
}


function inDirectCommission1($user_id)
{
    $inDirectCommission1 = Transaction::where('user_id', $user_id)->where('type','indirect commission 1')->sum('amount');
    return $inDirectCommission1;
}


function inDirectCommission2($user_id)
{
    $inDirectCommission2 = Transaction::where('user_id', $user_id)->where('type','indirect commission 2')->sum('amount');
    return $inDirectCommission2;
}

function inDirectCommission3($user_id)
{
    $inDirectCommission3 = Transaction::where('user_id', $user_id)->where('type','indirect commission 3')->sum('amount');
    return $inDirectCommission3;
}

function inDirectCommission4($user_id)
{
    $inDirectCommission4 = Transaction::where('user_id', $user_id)->where('type','indirect commission 4')->sum('amount');
    return $inDirectCommission4;
}

function inDirectCommission5($user_id)
{
    $inDirectCommission5 = Transaction::where('user_id', $user_id)->where('type','indirect commission 5')->sum('amount');
    return $inDirectCommission5;
}

function inDirectCommission6($user_id)
{
    $inDirectCommission6 = Transaction::where('user_id', $user_id)->where('type','indirect commission 6')->sum('amount');
    return $inDirectCommission6;
}

function inDirectTotalCommission($user_id)
{
    $total = inDirectCommission1($user_id) + inDirectCommission2($user_id) + inDirectCommission3($user_id) + inDirectCommission4($user_id) + inDirectCommission5($user_id) + inDirectCommission6($user_id);
    return $total;
}
