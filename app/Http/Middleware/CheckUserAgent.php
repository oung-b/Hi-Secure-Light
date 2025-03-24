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

        // 쿠키에서 세션 ID 가져오기
        $sessionId = $request->cookie('hi_secure_session');

        if ($sessionId) {
            $sessionFilePath = storage_path("framework/sessions/{$sessionId}");
        
            if (file_exists($sessionFilePath)) {
                $sessionData = file_get_contents($sessionFilePath); // 세션 파일 내용 읽기
                $payload = unserialize($sessionData); // 세션 데이터 복호화
        
                $storedIpAddress = $payload['ip_address'] ?? 'N/A';
                $storedUserAgent = $payload['user_agent'] ?? 'N/A';
        
                // User-Agent 값이 다르면 로그아웃 처리
                if (($currentIpAddress !== $storedIpAddress) || ($storedUserAgent !== $currentUserAgent)) {
                    Log::warning('User-Agent mismatch!');
        
                    //Auth::logout(); // 로그아웃 처리
                    //session()->invalidate(); // 현재 세션 무효화
                    //session()->regenerateToken(); // CSRF 토큰 재생성
        
                    abort(403, '비정상적인 접근이 감지되었습니다.');
                }
            } else {
                Log::error("Session file not found: {$sessionFilePath}");
            }
        } else {
            Log::error("Session not found");
        }

        return $next($request);
    }
}