<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Mail\RefundConfirm;
use App\Models\RefundRequest;
use App\Models\UserPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ActivePlanController extends Controller
{
    public function index()
    {
        $statement = UserPlan::where('user_id', auth()->user()->id)->where('status', 'active')->get();
        return view('user.dashboard.statement.active-plan', compact('statement'));
    }

    public function refundReq($id)
    {
        $plan = UserPlan::findOrFail($id);


        // create a refund requet
        $refundRequest = new RefundRequest();
        $refundRequest->user_id = auth()->user()->id;
        $refundRequest->plan_id = $plan->id;
        $refundRequest->tid = rand(1, 999999999);
        $refundRequest->status = 'pending';
        $refundRequest->save();


        // sending confirmmation mail
        Mail::to(auth()->user()->email)->send(new RefundConfirm(auth()->user()->id, $plan->name, $refundRequest->tid));
        return back()->with('message', 'Please Check your email to Confirm Refund');
    }
}
