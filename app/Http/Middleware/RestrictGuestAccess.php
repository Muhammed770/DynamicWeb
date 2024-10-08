<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class RestrictGuestAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::guest()) {
            $allowedRoutes = [
                'login',
                'register',
                '/',
            ];
            if(!in_array($request->path(),$allowedRoutes)) {
                return redirect('/login')->with('error','You must be logged in to access this page');
            }
        }
        return $next($request);
    }
}
