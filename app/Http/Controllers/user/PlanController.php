<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Affiliate;
use App\Models\Plan;
use App\Models\Transaction;
use App\Models\User;
use App\Models\UserPlan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plans = Plan::all();
        return view('user.dashboard.plan.index', compact('plans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'plan_id' => 'required',
        ]);
        $plan = Plan::findOrFail($request->plan_id);

        // inserting Plan Acivate Transaction
        $deposit = new Transaction();
        $deposit->user_id = auth()->user()->id;
        $deposit->amount = $plan->price;
        $deposit->type = 'deposit';
        $deposit->sum = 'in';
        $deposit->status = 'approved';
        $deposit->save();

        // inserting Plan Activate Transaction
        $deposit = new Transaction();
        $deposit->user_id = auth()->user()->id;
        $deposit->amount = $plan->price;
        $deposit->type = 'deposit';
        $deposit->sum = 'out';
        $deposit->status = 'plan activated';
        $deposit->save();

        // activating this user plan
        $userPlan = new UserPlan();
        $userPlan->user_id = auth()->user()->id;
        $userPlan->plan_id = $validatedData['plan_id'];
        $userPlan->status = 'active';
        $userPlan->save();

        // activate this user status
        $user = User::find(auth()->user()->id);
        $user->status = 'active';
        $user->save();

        // checking if this user has valid refer for commission
        if ($user->refer != 'default') {
            // Direct Refer Commission
            $directRefer = Affiliate::where('level', 'Direct')->first()->value;
            $sponser = User::where('username', $user->refer)->first();

            // inserting Plan Activate Transaction
            $commission = new Transaction();
            $commission->user_id = $sponser->id;
            $commission->amount = $plan->price * $directRefer / 100;
            $commission->type = 'direct commission';
            $commission->sum = 'in';
            $commission->status = 'approved';
            $commission->reference = auth()->user()->username;
            $commission->save();

            // Indirect Refer Loop
            for ($i = 1; $i < 7; $i++) {
                // checking if this direct user has valid Refer
                if ($sponser->refer != 'default') {
                    // checking if this direct user has valid Refer
                    $level = "Level " . $i;
                    $indirectRefer = Affiliate::where('level', $level)->first()->value;
                    $sponser = User::where('username', $sponser->refer)->first();

                    // inserting Plan Activate Transaction
                    $commission = new Transaction();
                    $commission->user_id = $sponser->id;
                    $commission->amount = $plan->price * $indirectRefer / 100;
                    $commission->type = 'indirect commission '.$i;
                    $commission->sum = 'in';
                    $commission->reference = auth()->user()->username;
                    $commission->status = 'approved';
                    $commission->save();
                } else {
                    goto endLoop;
                }
            }
            endLoop:
        }

        return redirect()->route('user.dashboard')->with('message', 'Plan Activated Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Plan $plan)
    {
        return view('user.dashboard.plan.show', compact('plan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
