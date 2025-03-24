<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Http\Controllers\UserLogController;
use App\Models\GlobalSetting;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Actions\AttemptToAuthenticate;
use Laravel\Fortify\Actions\CanonicalizeUsername;
use Laravel\Fortify\Actions\EnsureLoginIsNotThrottled;
use Laravel\Fortify\Actions\PrepareAuthenticatedSession;
use Laravel\Fortify\Actions\RedirectIfTwoFactorAuthenticatable;
use Laravel\Fortify\Features;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Fortify::loginView(function () {
            $globalSetting = GlobalSetting::first();
            return view('auth.index')->with('globalSetting', $globalSetting);
        });
        Fortify::twoFactorChallengeView(function () {
            return view('auth.two-factor-challenge');
        });
        Fortify::authenticateUsing(function (Request $request) {
            $userLog = App::make(UserLogController::class);

            $user = User::firstWhere('ids', $request->ids);
            if ($user) {
                if (Hash::check($request->password, $user->password)) {
                    if ($user->period_of_use < now()->toDateString()) {
                        $userLog->failLog($user->id, $user->ids);
                        throw ValidationException::withMessages([
                            'ids' => trans('auth.deactivated'),
                        ]);
                    }
                    $user->resetPasswordCount();
                    return $user;
                } else {
                    $user->incrementPasswordCount();
                    $userLog->failLog($user->id, $user->ids);
                    if ($user->password_count >= 5) {
                        $user->period_of_use = Carbon::yesterday()->toDateString();
                        $user->save();
                        throw ValidationException::withMessages([
                            'ids' => trans('auth.deactivated'),
                        ]);
                    } else {
                        throw ValidationException::withMessages([
                            // 'ids' => trans($user->password_count . '/5 Wrong password. Try again or click Forgot password to reset it.'),
                            'ids' => trans('auth.failed'),
                        ]);
                    }
                }
            }
        });

        // 2차인증 성공후 log, logout 이후 로그 작성하기
//        Fortify::authenticateThrough(function (Request $request) {
//            return array_filter([
//                config('fortify.limiters.login') ? null : EnsureLoginIsNotThrottled::class,
//                config('fortify.lowercase_usernames') ? CanonicalizeUsername::class : null,
//                Features::enabled(Features::twoFactorAuthentication()) ? RedirectIfTwoFactorAuthenticatable::class : null,
//                AttemptToAuthenticate::class,
//                PrepareAuthenticatedSession::class,
//            ]);
//        });

        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        RateLimiter::for('login', function (Request $request) {
            $throttleKey = Str::transliterate(Str::lower($request->input(Fortify::username())) . '|' . $request->ip());

            return Limit::perMinute(5)->by($throttleKey);
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });
    }
}
