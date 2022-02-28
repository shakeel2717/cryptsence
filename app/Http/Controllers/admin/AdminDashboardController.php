<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserPlan;
use Illuminate\Http\Request;

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
        }])->where('status','active')->get();


        $pendingInvest = UserPlan::with(['plan' => function ($query) {
            $query->sum('price');
        }])->where('status','pending')->get();


        $completeInvest = UserPlan::with(['plan' => function ($query) {
            $query->sum('price');
        }])->where('complete',1)->get();

        return view('admin.dashboard.index', compact('user','invest','totalInvest','activeInvest','pendingInvest','completeInvest'));
    }
}
