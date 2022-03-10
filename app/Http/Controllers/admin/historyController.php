<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;
use App\Models\UserPlan;
use App\Models\Withdraw;
use Illuminate\Http\Request;

class historyController extends Controller
{

    public function users()
    {
        $users = User::get();
        return view('admin.dashboard.history.users', compact('users'));
    }

    public function usersStopRoi($user)
    {
        $user = User::findOrFail($user);
        $user->roi = 0;
        $user->save();
        return redirect()->back()->with('message', 'User Roi Successfully Stopped');
    }

    public function usersStartRoi($user)
    {
        $user = User::findOrFail($user);
        $user->roi = 1;
        $user->save();
        return redirect()->back()->with('message', 'User Roi Successfully Started');
    }


    public function deposits()
    {
        $statement = Transaction::where('type', 'deposit')->get();
        return view('admin.dashboard.history.deposits', compact('statement'));
    }

    public function withdrawals()
    {
        $statement = Withdraw::get();
        return view('admin.dashboard.history.withdrawals', compact('statement'));
    }


    public function pendingWithdrawals()
    {
        $statement = Withdraw::where('status', 'pending')->get();
        return view('admin.dashboard.history.pendingWithdrawals', compact('statement'));
    }


    public function withdrawalsApprove($id)
    {
        $Withdraw = Withdraw::findOrFail($id);
        $Withdraw->status = 'approved';
        $Withdraw->save();

        // finding this tid
        $transaction = Transaction::where('user_id', $Withdraw->user_id)->where('type', 'withdraw')->where('amount', $Withdraw->amount)->where('status', 'pending')->first();
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

    public function userVerified($id)
    {
        $user = User::findOrFail($id);
        $user->email_verified_at = now();
        $user->save();
        return redirect()->back()->with('message', 'User Verified Successfully');
    }
}
