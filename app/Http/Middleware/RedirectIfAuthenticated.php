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
        if (Auth::guard($guard)->check()) {
            if(auth()->user()->user_type == 1){
                return redirect(RouteServiceProvider::ADMIN);    
            }
            if(auth()->user()->user_type == 4){
                return redirect(RouteServiceProvider::AGENT);    
            }
            if(auth()->user()->user_type == 5){
                return redirect(RouteServiceProvider::DEVELOPER);    
            }
            return redirect(RouteServiceProvider::HOME);
        }

        return $next($request);
    }
}
