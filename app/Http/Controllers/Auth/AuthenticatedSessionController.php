<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UserLogController;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\GlobalSetting;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    protected $userLogController;

    public function __construct(UserLogController $userLogController)
    {
        $this->userLogController = $userLogController;
    }

    /**
     * Display the login view.
     */
    public function create(): View
    {
        $globalSetting = GlobalSetting::first();
        return view('auth.index')->with('globalSetting', $globalSetting);
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $this->userLogController->log('login');

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $this->userLogController->log('logout');

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
