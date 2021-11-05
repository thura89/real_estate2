<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            if(auth()->user()->user_type == 1 || auth()->user()->user_type == 2 || auth()->user()->user_type == 3){
                return $next($request);
            }
        }
        
   
        return redirect('/')->with('error',"You don't have admin access.");
    }
}
