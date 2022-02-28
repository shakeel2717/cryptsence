<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class FinanceController extends Controller
{
    public function addBalance()
    {
        return view('admin.dashboard.finance.addBalance');
    }


    public function addBalanceStore(Request $request)
    {
        $validatedData = $request->validate([
            'amount' => 'required|numeric|min:1',
            'username' => 'required|string|exists:users',
        ]);
        $user = User::where('username', $validatedData['username'])->firstOrFail();
        // add deposit transaction for this user
        $deposit = new Transaction();
        $deposit->user_id = $user->id;
        $deposit->amount = $validatedData['amount'];
        $deposit->type = 'deposit';
        $deposit->reference = 'Admin';
        $deposit->sum = 'in';
        $deposit->status = 'approved';
        $deposit->save();

        return redirect()->back()->with('message', 'Balance added successfully');


    }
}
