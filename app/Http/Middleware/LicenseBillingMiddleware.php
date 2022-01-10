<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LicenseBillingMiddleware
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

        $license =  auth()->user()->company->license;
        if ($license->status != 'payed') {
            return redirect()->route('license.billing');
        }
        return $next($request);
    }
}
