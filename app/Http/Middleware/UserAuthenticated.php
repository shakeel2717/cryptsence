<?php

namespace App\Http\Middleware;

use App\Models\OnlineUser;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if (Auth::user()->role != 'user') {
            return redirect()->route('login');
        }

        // checking if this user is suspended
        if(Auth::user()->status == "suspend"){
            Auth::guard('web')->logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();
            return redirect()->route('login')->withErrors('Your Account is Suspended!, Please Contact Support!');
        } else {
            return $next($request);
        }
    }
}
