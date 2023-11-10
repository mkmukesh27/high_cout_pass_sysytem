<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureIsLoggedIn
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
        /* if (!auth()->guard('webadmin')->check()) {
            //return redirect("login")->withErrors("session is expired.");
            return redirect("logout");
        } */
        if (!session()->has("loginData")) {
            return redirect("logout");
        }
        return $next($request);
    }
}
