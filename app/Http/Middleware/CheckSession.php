<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CheckSession
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
        $yesterday = Carbon::yesterday();
        $userDate = \Auth::user()->last_login_at;

        // if last session was a day ago, redirect to /sesiones
        if( $yesterday->diffInHours($userDate) >= 24 ){
            return redirect('/sessions');
        }

        return $next($request);
        //return route('home');
    }
}
