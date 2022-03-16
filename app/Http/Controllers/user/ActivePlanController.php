<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\UserPlan;
use Illuminate\Http\Request;

class ActivePlanController extends Controller
{
    public function index()
    {
        $statement = UserPlan::where('user_id', auth()->user()->id)->where('status','active')->get();
        return view('user.dashboard.statement.active-plan', compact('statement'));
    }

    public function refundReq($id)
    {
        $plan = UserPlan::findOrFail($id);
        $plan->status = 'refund request';
        $plan->save();
        return back()->with('message', 'Refund request has been sent successfully');
    }
}
