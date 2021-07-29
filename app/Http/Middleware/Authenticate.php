<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    protected function redirectTo($request)
    {
        // if (! $request->expectsJson()) {
        //     return route('login');
        // }

        $guards = [];
        
        if (! $request->expectsJson()) {
            switch (current($guards)) {
                case 'shop_user':
                    return route('/front.index');
                
                default:
                    return route('login');
            }
        }
    }
}
