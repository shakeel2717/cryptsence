<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Mail\WithdrawComplete;
use App\Models\btcPayments;
use App\Models\ProfitWithdraw;
use App\Models\Transaction;
use App\Models\User;
use App\Models\user\RoiTransaction;
use App\Models\user\Support;
use App\Models\UserPlan;
use App\Models\Withdraw;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

    public function withdrawalsProfit()
    {
        $statement = ProfitWithdraw::get();
        return view('admin.dashboard.history.withdrawalsProfit', compact('statement'));
    }


    public function pendingWithdrawals()
    {
        $statement = Withdraw::where('status', 'pending')->get();
        return view('admin.dashboard.history.pendingWithdrawals', compact('statement'));
    }

    public function pendingProfitWithdrawals()
    {
        $statement = ProfitWithdraw::where('status', 'pending')->get();
        return view('admin.dashboard.history.pendingProfitWithdrawals', compact('statement'));
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

        $amount = $Withdraw->amount;
        $method = $Withdraw->method;
        $address = $Withdraw->address;

        // sending email to user
        Mail::to($transaction->user->email)->send(new WithdrawComplete($amount, $method, $address));
        return redirect()->back()->with('message', 'Withdraw Approved');
    }

    public function withdrawalsProfitApprove($id)
    {
        $Withdraw = ProfitWithdraw::findOrFail($id);
        $Withdraw->status = 'approved';
        $Withdraw->save();

        // finding this tid
        $transaction = RoiTransaction::where('user_id', $Withdraw->user_id)->where('reference', 'self withdraw')->where('amount', $Withdraw->amount)->where('status', 'pending')->first();
        $transaction->status = 'approved';
        $transaction->save();

        $amount = $Withdraw->amount;
        $method = $Withdraw->method;
        $address = $Withdraw->address;

        // sending email to user
        Mail::to($transaction->user->email)->send(new WithdrawComplete($amount, $method, $address));
        return redirect()->back()->with('message', 'Withdraw Approved');
    }





    public function withdrawalsReject($id)
    {
        $Withdraw = Withdraw::findOrFail($id);
        $Withdraw->delete();

        // finding this tid
        $transaction = Transaction::where('user_id', $Withdraw->user_id)->where('type', 'withdraw')->where('amount', $Withdraw->amount)->where('status', 'pending')->first();
        $transaction->delete();
        return redirect()->back()->with('message', 'This User Transaction Deleted Successfully');
    }


    public function withdrawalsProfitReject($id)
    {
        $Withdraw = ProfitWithdraw::findOrFail($id);
        $Withdraw->delete();

        // finding this tid
        $transaction = RoiTransaction::where('user_id', $Withdraw->user_id)->where('reference', 'self withdraw')->where('amount', $Withdraw->amount)->where('status', 'pending')->first();
        $transaction->delete();
        return redirect()->back()->with('message', 'This User Transaction Deleted Successfully');
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


    public function userPlanRefund()
    {
        $statement = UserPlan::where('status', 'refund request')->get();
        return view('admin.dashboard.history.userPlanRefund', compact('statement'));
    }


    public function userPlanRefundApprove($id)
    {
        $userPlan = UserPlan::findOrFail($id);
        $userPlan->status = 'refunded';

        // get days from two dates
        $date1 = new DateTime($userPlan->created_at);
        $date2 = new DateTime(now());
        $diff = $date2->diff($date1)->format("%a");
        if ($diff <= 30) {

            $amount = $userPlan->plan->price * 25 / 100;
            $calc = $userPlan->plan->price - $amount;

            $deposit = new Transaction();
            $deposit->user_id = $userPlan->user_id;
            $deposit->amount = $calc;
            $deposit->type = 'deposit';
            $deposit->reference = 'Refund Balance with 25% fees';
            $deposit->sum = 'in';
            $deposit->status = 'approved';
            $deposit->save();
        } else {
            $userPlan->status = 'refunded full amount';
            $deposit = new Transaction();
            $deposit->user_id = $userPlan->user_id;
            $deposit->amount = $userPlan->plan->price;
            $deposit->type = 'deposit';
            $deposit->reference = 'Refund Balance full amount';
            $deposit->sum = 'in';
            $deposit->status = 'approved';
            $deposit->save();
        }
        $userPlan->save();

        return redirect()->back()->with('message', 'User Plan Refunded Successfully');
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

    public function saleStop($id)
    {
        $userPlan = User::findOrFail($id);
        $userPlan->sale = 0;
        $userPlan->save();
        return redirect()->back()->with('message', 'Sale Successfully Stoped');
    }


    public function saleStart($id)
    {
        $userPlan = User::findOrFail($id);
        $userPlan->sale = 1;
        $userPlan->save();
        return redirect()->back()->with('message', 'Sale Successfully Stoped');
    }


    public function passiveStop($id)
    {
        $userPlan = User::findOrFail($id);
        $userPlan->passive = 0;
        $userPlan->save();

        return redirect()->back()->with('message', 'Passive 3 Level Profit Successfully Stoped');
    }


    public function passiveStart($id)
    {
        $userPlan = User::findOrFail($id);
        $userPlan->passive = 1;
        $userPlan->save();

        return redirect()->back()->with('message', 'Passive 3 Level Profit Successfully Started');
    }




    public function userVerified($id)
    {
        $user = User::findOrFail($id);
        $user->email_verified_at = now();
        $user->save();
        return redirect()->back()->with('message', 'User Verified Successfully');
    }


    public function coinpayment()
    {
        $statement = btcPayments::where('status', '!=', 'error')->where('status', '!=', 'initialized')->get();
        return view('admin.dashboard.history.coinpayment', compact('statement'));
    }


    public function coinpaymentOther()
    {
        $statement = btcPayments::where('status', '!=', 'complete')->get();
        return view('admin.dashboard.history.coinpaymentOther', compact('statement'));
    }

    public function support()
    {
        $statement = Support::get();
        return view('admin.dashboard.history.support', compact('statement'));
    }

    public function supportSolved($id)
    {
        $support = Support::findOrFail($id);
        $support->status = 'solved';
        $support->save();
        return redirect()->back()->with('message', 'Support Solved Successfully');
    }
}
