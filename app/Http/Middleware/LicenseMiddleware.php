<?php

namespace App\Http\Middleware;

use App\Models\CompanyLicense;
use Closure;
use Illuminate\Http\Request;

class LicenseMiddleware
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

        if (!$license) {
            return redirect()->route('license.validate');
        }

        if (!$license->isActive()) {
            return redirect()->route('license.notice');
        }
        return $next($request);
    }
}
