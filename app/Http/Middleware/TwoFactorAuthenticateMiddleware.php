<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TwoFactorAuthenticateMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        return auth()->user()->two_factor_confirmed_at ? $next($request) : redirect()->route('two-factor-authentication-form');
    }
}
