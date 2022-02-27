<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view('user.dashboard.profile.index');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $user = User::find(auth()->user()->id);
        $user->name = $request->name;
        $user->save();

        return redirect()->route('user.profile.index')->with('message', 'Profile updated successfully.');
    }


    public function passwordChange()
    {
        return view('user.dashboard.profile.password.change');
    }


    public function passwordupdate(Request $request)
    {
        $validatedData = $request->validate([
            'cpassword' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::find(auth()->user()->id);
        if (Hash::check($request->cpassword, $user->password)) {
            $user->password = bcrypt($request->password);
            $user->save();
            return redirect()->route('user.profile.index')->with('message', 'Password updated successfully.');
        } else {
            return redirect()->route('user.profile.password.change')->withErrors('Current password is incorrect.');
        }

    }
}
