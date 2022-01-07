<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsUser
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
            if(auth()->user()->user_type == 6 || auth()->user()->user_type == null){
                return $next($request);
            }
        }
        
   
        return redirect('/')->with('error',"You don't have admin access.");
    }
}
