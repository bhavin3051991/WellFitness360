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
        // if (Auth::guard($guard)->check()) {
        //     echo 'hiii';die;
        //     if(Auth::user()->role_id === 1){
        //         return redirect('/admin');
        //     }else if(Auth::user()->role_id === 3){
        //         return redirect('trainer');
        //     }else{
        //         return redirect('/user');
        //     }
        //     //  return redirect(RouteServiceProvider::HOME);
        // }
        return $next($request);
    }
}
