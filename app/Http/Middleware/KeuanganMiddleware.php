<?php

namespace App\Http\Middleware;

use Closure;

class KeuanganMiddleware
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
        if ($request->user() && $request->user()->level != "keuangan") {
            return redirect()->route('403');
        }
        return $next($request);
    }
}
