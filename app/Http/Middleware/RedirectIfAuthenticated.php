<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            
            switch ($guard) {
                case 'shop_user':
                    return redirect(RouteServiceProvider::SHOP_HOME);
                default:
                    return redirect(RouteServiceProvider::HOME);
            }
        }

        return $next($request);
    }
}
