<?php

namespace App\Http\Middleware;

use Closure;

class ProtokolerMiddleware
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
        if ($request->user() && $request->user()->level != "protokoler") {
            return redirect()->route('403');
        }
        return $next($request);
    }
}
