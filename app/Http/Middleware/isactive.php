<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class isactive
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
        if(auth()->user()->hasRole('member')){
            if(auth()->user()->member->status == 0)
            {
                Auth::logout();
                Session::flush();
                return redirect()->route('login')->with('error','Status akun tidak aktif');
            }
        }
        return $next($request);
    }
}
