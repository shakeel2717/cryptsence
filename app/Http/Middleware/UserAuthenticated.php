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

        $onlineUser = OnlineUser::updateOrCreate(
            ['user_id' => Auth::id()],
            ['updated_at' => now()]
        );


        if (Auth::user()->role != 'user') {
            return redirect()->route('login');
        }
        return $next($request);
    }
}
