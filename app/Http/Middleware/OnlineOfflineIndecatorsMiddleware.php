<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use function Symfony\Component\Clock\now;

class OnlineOfflineIndecatorsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Set the user's online status to true when they make a request
        if (auth()->check()) {
            auth()->user()->update(['last_seen' => now()]);
        }

        // Call the next middleware or controller
        return $next($request);
    }
}
