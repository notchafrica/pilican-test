<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckSingleSession
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
        $previous_session = Auth::User()->session_id;
        if ($previous_session !== Session::getId()) {

            Session::getHandler()->destroy($previous_session);

            $request->session()->regenerate();

            $user = Auth::user();
            $user->session_id = Session::getId();

            $user->save();
        }
        return $next($request);
        return $next($request);
    }
}
