<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if(!Session::has('user_id')) {
            return Redirect::route('auth.login')->with('relogin', 'Session expired. Please log in again to continue.');
        }
        if (Session::has('expiretime')) {
            $expireTime = Session::get('expiretime');
            if (time() >= $expireTime) {
                Session::flush();
                return Redirect::route('auth.login')->with('relogin', 'Session expired. Please log in again.');
            }
        }

        return $next($request);
    }
}

