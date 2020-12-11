<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;

class ProfileJsonMiddleware
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
        $response = $next($request);

        if ($response instanceof JsonResponse && app('debugbar')->isEnabled() && $request->has('_debug')) {
            $response->setData($response->getData(true) + [
                '_debugbar' => array_only(app('debugbar')->getData(), 'queries')
            ]);
        }

        return $response;
    }
}


// kernel
'api' => [
        'throttle:api',
        \App\Http\Middleware\ProfileJsonResponse::class,
],

// google chrome
http://localhost:8000/api/news?_debug