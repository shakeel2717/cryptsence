<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Ctse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        // storing this balance into user account
        $validated = $request->validate([
            'address' => 'required|string',
        ]);

        if (ctse(auth()->user()->id) < 1) {
            return redirect()->back()->withErrors("Insufficient CTSE Balance");
        }



        $response = Http::post("https://cryptsence.io/payment/cryptsence", [
            'user_id' => auth()->user()->id,
            'amount' => ctse(auth()->user()->id),
            'address' => $validated['address'],
            'secret' => env("CTSE_SECRET_KEY"),
        ]);

        if ($response) {
            // inserting command
            $ctse = new Ctse();
            $ctse->user_id = auth()->user()->id;
            $ctse->type = "withdraw";
            $ctse->sum = false;
            $ctse->status = "pending";
            $ctse->address = $validated['address'];
            $ctse->amount = ctse(auth()->user()->id);
            $ctse->save();
        }

        return redirect()->back()->with("success", "CTSE Sent Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
