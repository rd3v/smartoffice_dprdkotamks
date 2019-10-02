<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Response;

use Closure;

class KomisiMiddleware
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
        if ($request->user() && $request->user()->level != "komisi") {
            return redirect()->route('403');
        }
        return $next($request);
    }
}
