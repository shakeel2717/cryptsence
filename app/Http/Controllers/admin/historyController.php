<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;
use App\Models\UserPlan;
use Illuminate\Http\Request;

class historyController extends Controller
{

    public function users()
    {
        $users = User::get();
        return view('admin.dashboard.history.users', compact('users'));
    }

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


    public function pendingWithdrawals()
    {
        $statement = Transaction::where('type', 'withdraw')->where('status','pending')->get();
        return view('admin.dashboard.history.pendingWithdrawals', compact('statement'));
    }


    public function withdrawalsApprove($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->status = 'approved';
        $transaction->save();

        return redirect()->back()->with('message', 'Withdraw Approved');
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


    public function userPlan()
    {
        $statement = UserPlan::get();
        return view('admin.dashboard.history.userPlan', compact('statement'));
    }



    public function deleteTransaction($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();
        return redirect()->back()->with('message', 'Transaction deleted successfully');
    }


    public function makePin($id)
    {
        $userPlan = User::findOrFail($id);
        $userPlan->network = 1;
        $userPlan->save();
        return redirect()->back()->with('message', 'Pin created successfully');
    }


    public function unPin($id)
    {
        $userPlan = User::findOrFail($id);
        $userPlan->network = 0;
        $userPlan->save();
        return redirect()->back()->with('message', 'Pin Removed successfully');
    }
}
