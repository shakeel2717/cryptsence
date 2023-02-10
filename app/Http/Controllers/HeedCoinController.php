<?php

namespace App\Http\Controllers;

use App\Models\HeedCoin;
use Illuminate\Http\Request;

class HeedCoinController extends Controller
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
        $validated = $request->validate([
            'address' => 'required|string|min:10|max:255',
            'username' => 'required|string|min:3|max:255',
        ]);

        $heed = HeedCoin::updateOrCreate([
            'user_id' => auth()->user()->id
        ], [
            'address' => $validated['address'],
            'ctse_username' => $validated['username'],
        ]);

        return back()->with('status', 'Address Updated Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HeedCoin  $heedCoin
     * @return \Illuminate\Http\Response
     */
    public function show(HeedCoin $heedCoin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HeedCoin  $heedCoin
     * @return \Illuminate\Http\Response
     */
    public function edit(HeedCoin $heedCoin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HeedCoin  $heedCoin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HeedCoin $heedCoin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HeedCoin  $heedCoin
     * @return \Illuminate\Http\Response
     */
    public function destroy(HeedCoin $heedCoin)
    {
        //
    }
}
