<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/


Route::get("/nac/nodes", [\App\Http\Controllers\Api\NacController::class, "nodes"]);
Route::get("/nac/ips", [\App\Http\Controllers\Api\NacController::class, "ips"]);
Route::get("/nac/wlan", [\App\Http\Controllers\Api\NacController::class, "wlan"]);
Route::get("/nac/log", [\App\Http\Controllers\Api\NacController::class, "log"]);
Route::get("/nac/condition", [\App\Http\Controllers\Api\NacController::class, "condition"]);

//Route::get("/ips", [\App\Http\Controllers\Api\FirewallController::class, "ipsIndex"]);
//Route::delete("/ips", [\App\Http\Controllers\Api\FirewallController::class, "ipsDestroy"]);
//Route::post("/ips", [\App\Http\Controllers\Api\FirewallController::class, "ipsStore"]);
//
//Route::get("/nats", [\App\Http\Controllers\Api\FirewallController::class, "natsIndex"]);
//Route::delete("/nats", [\App\Http\Controllers\Api\FirewallController::class, "natsDestroy"]);
//Route::post("/nats", [\App\Http\Controllers\Api\FirewallController::class, "natsStore"]);

Route::get("/histories", [\App\Http\Controllers\Api\HistoryController::class, "index"]);
Route::post("/histories", [\App\Http\Controllers\Api\HistoryController::class, "store"]);
Route::patch("/devices", [\App\Http\Controllers\Api\HistoryController::class, "update"]);

Route::post("/users/login", [\App\Http\Controllers\Api\UserController::class, "login"]);
Route::delete("/users", [\App\Http\Controllers\Api\UserController::class, "destroy"]);
Route::resource("/users", \App\Http\Controllers\Api\UserController::class);

Route::get("/firewalls/dashboard", [\App\Http\Controllers\Api\FirewallController::class, "dashboard"]);
Route::get("/firewalls/secureMonitoring", [\App\Http\Controllers\Api\FirewallController::class, "secureMonitoring"]);
Route::get("/alarms/store", [\App\Http\Controllers\Api\AlarmController::class, "store"]);
Route::get("/alarms", [\App\Http\Controllers\Api\AlarmController::class, "index"]);

Route::post('/secureAlarms', [\App\Http\Controllers\Api\SecureAlarmController::class, 'store']);

//Route::middleware('auth')->group(function () {
//    Route::middleware('admin')->group(function () {
        Route::get("/nac/allows", [\App\Http\Controllers\Api\NacController::class, "allows"]);
        Route::get("/nac/blocks", [\App\Http\Controllers\Api\NacController::class, "blocks"]);
        Route::post("/nac/allows", [\App\Http\Controllers\Api\NacController::class, "storeAllow"]);
        Route::post("/nac/blocks", [\App\Http\Controllers\Api\NacController::class, "storeBlock"]);
//    });
//});



