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
        $teamDirect = Transaction::where('user_id', auth()->user()->id)->where('type', 'passive income 1')->sum('amount');
        $teamInDirect1 = Transaction::where('user_id', auth()->user()->id)->where('type', 'passive income 2')->sum('amount');
        $teamInDirect2 = Transaction::where('user_id', auth()->user()->id)->where('type', 'passive income 3')->sum('amount');
        return view('user.dashboard.index', compact('transactions', 'refers', 'teamDirect', 'teamInDirect1', 'teamInDirect2'));
    }
}
