<?php

namespace App\Http\Requests\Auth;

use App\Http\Controllers\UserLogController;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
//            'email' => ['required', 'string', 'email'],
            'ids' => ['required', 'string'],
            'password' => ['required', 'string'],
        ];
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate(): void
    {
        $userLog = App::make(UserLogController::class);
//        $userLogController = new UserLogController();

        $this->ensureIsNotRateLimited();

        if (! Auth::attempt($this->only('ids', 'password'), $this->boolean('remember'))) {
            RateLimiter::hit($this->throttleKey());

            $user = User::whereIds($this->ids)->first();
            if ($user != null) {
                $user->incrementPasswordCount();
                if ($user->password_count >= 5) {
                    $user->period_of_use = Carbon::yesterday()->toDateString();
                    $user->save();
                    $userLog->failLog();
                    throw ValidationException::withMessages([
                        'ids' => trans('The account is deactivated, so please contact the administrator.'),
                    ]);
                } else {
                    $userLog->failLog();
                    throw ValidationException::withMessages([
                        'ids' => trans($user->password_count.'/5 Wrong password. Try again or click Forgot password to reset it.'),
                    ]);
                }
            } else {
                $userLog->failLog();
                throw ValidationException::withMessages([
                    'ids' => trans('auth.failed'),
                ]);
            }
        }

        if (Auth::user()->period_of_use < Carbon::now()->toDateString()) {
            Auth::logout();
            $userLog->failLog();
            throw ValidationException::withMessages([
                'ids' => trans('The account is deactivated, so please contact the administrator.'),
            ]);
        }

        $user = Auth::user();
        $user->password_count = 0;
        $user->save();

        RateLimiter::clear($this->throttleKey());
    }

    /**
     * Ensure the login request is not rate limited.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'ids' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the rate limiting throttle key for the request.
     */
    public function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->input('ids')).'|'.$this->ip());
    }
}
