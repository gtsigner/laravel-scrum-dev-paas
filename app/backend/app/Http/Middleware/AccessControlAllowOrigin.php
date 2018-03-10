<?php

namespace App\Http\Middleware;

use Closure;

class AccessControlAllowOrigin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        $response->header('Access-Control-Allow-Origin', '*');
        $response->header('Access-Control-Allow-Headers', 'Origin, Content-Type, Cookie, Accept, Token, Authorization');
        $response->header('Access-Control-Allow-Methods', 'GET, POST, PATCH, PUT, OPTIONS');
        if ($request->method() === 'OPTIONS') {
            response('OPTIONS FILTER', 200, [
                'Access-Control-Allow-Origin' => '*',
                'Access-Control-Allow-Headers' => 'Origin, Content-Type, Cookie, Accept, Token, Authorization',
                'Access-Control-Allow-Methods' => 'GET, POST, PATCH, PUT, OPTIONS',
            ])->send();
        }
        return $response;
    }
}
