<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function index()
    {
        $transactions = Transaction::where('user_id', auth()->user()->id)->latest()->limit(8)->get();
        $refers = User::where('refer', auth()->user()->username)->get();
        return view('user.dashboard.index', compact('transactions', 'refers'));
    }
}
