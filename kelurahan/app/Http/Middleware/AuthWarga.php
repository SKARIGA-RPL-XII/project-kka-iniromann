<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotWarga
{
    public function handle($request, Closure $next, $guard = 'warga')
    {
        if (!Auth::guard($guard)->check()) {
            return redirect('/login/warga');
        }

        return $next($request);
    }
}