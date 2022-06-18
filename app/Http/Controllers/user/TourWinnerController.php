<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class TourWinnerController extends Controller
{
    public function selfSell()
    {
        $winners = User::whereIn('id',selfWinner())->get();
        return view('admin.dashboard.winner.self', compact('winners'));
    }
}
