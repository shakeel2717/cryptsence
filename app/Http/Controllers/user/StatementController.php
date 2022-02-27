<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class StatementController extends Controller
{
    public function deposits()
    {
        $statement = Transaction::where('user_id', auth()->user()->id)->where('type', 'deposit')->get();
        return view('user.dashboard.statement.deposits', compact('statement'));
    }
}
