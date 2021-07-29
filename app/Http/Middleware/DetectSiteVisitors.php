<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
use App\Models\Visitor;

class DetectSiteVisitors
{
    public function handle(Request $request, Closure $next)
    {
        // $ipAddress  = '2.5.7.134';
        
        // $agent      = new Agent();
        // $data       = unserialize(file_get_contents('http://ip-api.com/php/' . $ipAddress));

        // Visitor::create([
        //     'user_ip' => $request->ip(),
        //     'browser' => $agent->browser(),
        //     'platform' => $agent->platform(),
        //     'is_phone' => $agent->isPhone(),
        //     'is_desktop' => $agent->isDesktop(),
        //     'country' => $data['country'],
        //     'city' => $data['city'],
        //     'region_name' => $data['regionName'],
        //     'page_url' => $request->url(),
        // ]);

        return $next($request);
    }
}
