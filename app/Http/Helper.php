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
    $in = Transaction::where('user_id', $user_id)->where('sum','in')->sum('amount');
    return $in;
}

function withdraw($user_id){
    $withdraw = Transaction::where('user_id', $user_id)->where('type','withdraw')->sum('amount');
    return $withdraw;
}
