<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\GlobalSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CheckUserAgent
{
    /**
     * 요청을 처리하기 전에 실행되는 미들웨어
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // 현재 요청한 사용자의 ip, User-Agent
        $currentIpAddress = $request->ip();
        $currentUserAgent = $request->header('User-Agent');

        // Redis 세션에서 데이터 가져오기 (세션이 Redis에 저장되므로)
        $storedIpAddress = session('ip_address');
        $storedUserAgent = session('user_agent');

        if ($storedIpAddress && $storedUserAgent) {
            // User-Agent 값이 다르면 로그아웃 처리
            if (($currentIpAddress !== $storedIpAddress) || ($storedUserAgent !== $currentUserAgent)) {
                Log::warning('User-Agent mismatch!');

                //Auth::logout(); // 로그아웃 처리
                //session()->invalidate(); // 현재 세션 무효화
                //session()->regenerateToken(); // CSRF 토큰 재생성

                abort(403, '비정상적인 접근이 감지되었습니다.');
            }
        } else {
            Log::info('Session data not found');
        }

        return $next($request);
    }
}
