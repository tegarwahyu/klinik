<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class IsUser
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
        if(auth()->user()->is_user == 1){
            return $next($request);
        }
   
        return Redirect::back()->withErrors(['msg', 'Maaf tidak bisa ke halaman yang anda inginkan karena bukan hak anda']);
    }
}
