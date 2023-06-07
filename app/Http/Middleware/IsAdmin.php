<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
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
        // return $next($request);
        if(auth()->user()->is_admin == 1){
            return $next($request);
        }
        else if(auth()->user()->is_admin == 2){
            return $next($request);
        }
        else if(auth()->user()->is_admin == 0){
            return $next($request);
        }
    
        return redirect('/')->with('error',"You are not register yet or Your account not been approved by Admin yet. Please be patient. Thank You.");
    }
}
