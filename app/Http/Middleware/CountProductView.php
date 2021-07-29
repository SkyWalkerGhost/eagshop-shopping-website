<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\ProductView;
use Auth;

class CountProductView
{
    public function handle(Request $request, Closure $next)
    {

        $name = Auth::guard('shop_user')->check() 
                    ? Auth::guard('shop_user')->user()->name 
                    : null;

        $authId = Auth::guard('shop_user')->check() 
                    ? Auth::guard('shop_user')->user()->id 
                    : null;

        ProductView::create([
            'product_id' => $request->product_id,
            'user_name' => $name,
            'user_id' => $authId,
            'user_ip' => $request->ip(),
        ]);

        return $next($request);
    }
}
