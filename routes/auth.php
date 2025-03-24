<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\HiSecureController;
use Illuminate\Support\Facades\Route;

//Route::middleware('guest')->group(function () {
//    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
//    Route::post('login', [AuthenticatedSessionController::class, 'store']);
//});
Route::middleware('auth')->group(function () {
    Route::get('/two-factor-authentication-form', function () {
        if (auth()->user()->two_factor_confirmed_at) {
            return redirect()->route('dash-board.index');
        }
        return view('auth.two-factor-authentication-form');
    })->name('two-factor-authentication-form');
});

Route::middleware(['auth', 'two.factor'])->group(function () {
    Route::prefix('hi-secure')->group(function () {
        Route::get('/', [HiSecureController::class, 'index'])->name('hi-secure.index');
        Route::middleware('admin')->group(function () {
            Route::post('/', [HiSecureController::class, 'store'])->name('hi-secure.store');
            Route::get('/create', [HiSecureController::class, 'create'])->name('hi-secure.create');
            Route::patch('/{user}', [HiSecureController::class, 'update'])->name('hi-secure.update');
            Route::delete('/', [HiSecureController::class, 'delete'])->name('hi-secure.delete');
            Route::get('/{user}/edit', [HiSecureController::class, 'edit'])->name('hi-secure.edit');
            Route::get('/global-setting', [HiSecureController::class, 'globalSetting'])->name('hi-secure.global-setting');
            Route::patch('/global-setting/update', [HiSecureController::class, 'globalSettingUpdate'])->name('hi-secure.global-setting-update');
        });
    });

//    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});
