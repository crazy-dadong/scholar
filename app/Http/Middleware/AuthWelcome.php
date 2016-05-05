<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AuthWelcome
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

        if (Auth::check()) {
            return redirect()->action('User\Dashboard\DashboardController@getIndex');
        }else{
            return $next($request);
        }
    }
}
