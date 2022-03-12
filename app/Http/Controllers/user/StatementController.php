<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\directAward;
use App\Models\InDirectAward;
use App\Models\Transaction;
use App\Models\user\RoiTransaction;
use Illuminate\Http\Request;

class StatementController extends Controller
{
    public function deposits()
    {
        $statement = Transaction::where('user_id', auth()->user()->id)->where('type', 'deposit')->get();
        return view('user.dashboard.statement.deposits', compact('statement'));
    }

    public function withdrawals()
    {
        $statement = Transaction::where('user_id', auth()->user()->id)->where('type', 'withdraw')->get();
        return view('user.dashboard.statement.withdrawals', compact('statement'));
    }


    public function roi()
    {
        $statement = RoiTransaction::where('user_id', auth()->user()->id)->get();
        return view('user.dashboard.statement.roi', compact('statement'));
    }


    public function direct()
    {
        $statement = Transaction::where('user_id', auth()->user()->id)->where('type', 'direct commission')->get();
        return view('user.dashboard.statement.direct', compact('statement'));
    }


    public function inDirect()
    {
        $statement = Transaction::where('user_id', auth()->user()->id)->where('type', 'like', 'indirect commission %')->get();
        return view('user.dashboard.statement.inDirect', compact('statement'));
    }


    public function passive()
    {
        $statement = Transaction::where('user_id', auth()->user()->id)->where('type', 'like', 'passive income %')->get();
        return view('user.dashboard.statement.passive', compact('statement'));
    }


    public function ranks()
    {
        $ranks = directAward::get();
        return view('user.dashboard.statement.ranks',compact('ranks'));
    }


    public function ranksIndirect()
    {
        $ranks = InDirectAward::get();
        return view('user.dashboard.statement.ranksIndirect',compact('ranks'));
    }





    public function reward()
    {
        $statement = Transaction::where('user_id', auth()->user()->id)->where('type', 'direct business award')->get();
        return view('user.dashboard.statement.reward', compact('statement'));
    }


    public function indirectAward()
    {
        $statement = Transaction::where('user_id', auth()->user()->id)->where('type', 'InDirect 1 business award')->get();
        return view('user.dashboard.statement.indirectAward',compact('statement'));
    }



}
