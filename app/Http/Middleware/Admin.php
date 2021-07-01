<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Auth;

class Admin
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
        if(!\Auth::guest() && \Auth::user()->role==1){  
            return $next($request);
        }
        else{
            return redirect(route('ninja.login'))->with('error', 'Hatalı giriş..');
        }
        //return redirect(route('ninja.login'));
    }
}
