<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HasSetupProfile
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();
        if ($user->company || $user->profile) {
            return redirect()->route("home");
        }
        return $next($request);
    }
}
