<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserPlan;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $user = User::get();
        $invest = UserPlan::get();
        $totalInvest = UserPlan::with(['plan' => function ($query) {
            $query->sum('price');
        }])->get();

        $activeInvest = UserPlan::with(['plan' => function ($query) {
            $query->sum('price');
        }])->where('status', 'active')->get();


        $pendingInvest = UserPlan::with(['plan' => function ($query) {
            $query->sum('price');
        }])->where('status', 'pending')->get();


        $completeInvest = UserPlan::with(['plan' => function ($query) {
            $query->sum('price');
        }])->where('complete', 1)->get();

        return view('admin.dashboard.index', compact('user', 'invest', 'totalInvest', 'activeInvest', 'pendingInvest', 'completeInvest'));
    }



    public function loginUser(Request $request)
    {
        $validationData = $request->validate([
            'user_id' => 'required|integer',
        ]);

        $user = User::findOrFail($validationData['user_id']);
        Auth::logout();
        Auth::login($user);
        return redirect(RouteServiceProvider::HOME);
    }
}
