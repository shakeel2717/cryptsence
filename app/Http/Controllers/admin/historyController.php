<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class historyController extends Controller
{
    public function deposits()
    {
        $statement = Transaction::where('type', 'deposit')->get();
        return view('admin.dashboard.history.deposits', compact('statement'));
    }

    public function withdrawals()
    {
        $statement = Transaction::where('type', 'withdraw')->get();
        return view('admin.dashboard.history.withdrawals', compact('statement'));
    }



    public function rois()
    {
        $statement = Transaction::where('type', 'daily roi')->get();
        return view('admin.dashboard.history.roi', compact('statement'));
    }


    public function passive()
    {
        $statement = Transaction::where('type', 'like', 'passive income %')->get();
        return view('admin.dashboard.history.passive', compact('statement'));
    }


    public function indirect()
    {
        $statement = Transaction::where('type', 'like', 'indirect commission %')->get();
        return view('admin.dashboard.history.inDirectCommission', compact('statement'));
    }


    public function direct()
    {
        $statement = Transaction::where('type', 'direct commission')->get();
        return view('admin.dashboard.history.directCommission', compact('statement'));
    }
}
