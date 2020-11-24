<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CookieSession
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
        
        // Create Cookie if user has role 1 & IP = "127.0.0.1"
        if( \Auth::user()->hasrole(1) && $request->getClientIp() == "127.0.0.1" ){
            $cookie = cookie('origin_session', 'valor', 2);
        }

        //return $next($request)->cookie($cookie);
        return route('home')->cookie($cookie);
    }
}
