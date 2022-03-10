<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if ($guard == "aak" && Auth::guard($guard)->check()) {
            return redirect('/aak');
        }
        if ($guard == "mhs" && Auth::guard($guard)->check()) {
            return redirect('/mhs');
        }
        if ($guard == "dosen" && Auth::guard($guard)->check()) {
            return redirect('/doshome');
        }
        if ($guard == "keuangan" && Auth::guard($guard)->check()) {
            return redirect('/keuanganhome');
        }
        if ($guard == "perpustakaan" && Auth::guard($guard)->check()) {
            return redirect('/perpushome');
        }
        if (Auth::guard($guard)->check()) {
            return redirect(RouteServiceProvider::HOME);
        }

        return $next($request);
    }
}
