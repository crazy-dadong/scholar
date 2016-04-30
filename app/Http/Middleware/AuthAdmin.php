<?php

namespace App\Http\Middleware;

use Closure;
use Gate;

/**
 * 检查是否有后台权限
 * Class AuthAdmin
 * @package App\Http\Middleware
 */
class AuthAdmin
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
        if (Gate::denies('auth-admin')) {
            return redirect()->action('Auth\AuthController@getLogin');
        }
        return $next($request);
    }
}
