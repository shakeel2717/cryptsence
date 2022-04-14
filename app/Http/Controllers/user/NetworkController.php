<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class NetworkController extends Controller
{
    public function index()
    {
        $overAllRefers =  overAllRefers(auth()->user()->id);
        $refers = User::whereIn('id', $overAllRefers)->get();
        return view('user.dashboard.network.index', compact('refers'));
    }
}
