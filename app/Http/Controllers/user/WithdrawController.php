<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\Withdraw;
use Illuminate\Http\Request;

class WithdrawController extends Controller
{
    public function index()
    {
        return view('user.dashboard.withdraw.index');
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'amount' => 'required|numeric|min:1',
            'method' => 'required|string|max:255',
            'address' => 'required|alpha_num',
        ]);

        // checking if balance is enough
        if ($validatedData['amount'] > balance(auth()->user()->id)) {
            return redirect()->back()->withErrors('Insufficient balance');
        }

        $withdraw = new Withdraw();
        $withdraw->user_id = auth()->user()->id;
        $withdraw->amount = $validatedData['amount'];
        $withdraw->method = $validatedData['method'];
        $withdraw->address = $validatedData['address'];
        $withdraw->save();

        // inserting Plan Activate Transaction
        $withdraw = new Transaction();
        $withdraw->user_id = auth()->user()->id;
        $withdraw->amount = $validatedData['amount'];
        $withdraw->type = 'withdraw';
        $withdraw->sum = 'out';
        $withdraw->status = 'pending';
        $withdraw->save();

        return redirect()->route('user.dashboard')->with('message', 'Withdraw request has been sent');
    }
}
