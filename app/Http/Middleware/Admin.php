<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */


    public function handle($request, Closure $next, $guard = null)
    {   

        if (Auth::user()->role != 'admin' ) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
