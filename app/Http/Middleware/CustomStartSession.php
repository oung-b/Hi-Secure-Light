<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Support\Facades\Log;

class CustomStartSession extends StartSession
{
    /**
     * 요청을 처리하기 전에 실행되는 미들웨어
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        session(['ip_address' => $request->ip()]);
        session(['user_agent' => $request->header('User-Agent')]);
        
        return parent::handle($request, $next);
    }
}