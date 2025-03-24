<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->authority_id !== 1) {
            return redirect()->back();
        }
        return $next($request);
    }
}
