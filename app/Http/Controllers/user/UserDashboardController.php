<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function index()
    {
        $transactions = Transaction::where('user_id', auth()->user()->id)->latest()->get();
        return view('user.dashboard.index', compact('transactions'));
    }
}
