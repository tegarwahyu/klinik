<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class cekLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // return $next($request);
        if(!Auth::check()){
            return redirect('login');
        }

        $user = Auth::user();

        if($user->level == $role){
            return $next($request);
        }

        return redirect('login')->with('error',"kamu engga punya akses ");
    }
}
