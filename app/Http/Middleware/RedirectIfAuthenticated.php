<?php

namespace App\Http\Middleware;

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
            if(auth()->user()->active==1){
                return redirect('/');
            }
            if(auth()->user()->active==0){
                Auth::logout();
                Session::flush();
                return redirect('/login')->withInput()->with('not_active','Akun anda belum aktif, Hubungi admin untuk aktivasi');
            }
            // return redirect('/home');
        }

        return $next($request);
    }
}
