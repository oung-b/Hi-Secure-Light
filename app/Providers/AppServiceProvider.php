<?php

namespace App\Providers;

use App\Enums\DeviceStatus;
use App\Models\Device;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer("*", function($view){
            $devices = Device::get();

            $view->with([
                "devices" => $devices,
                "count_device_status" => [
                    DeviceStatus::UP => Device::where("status", DeviceStatus::UP)->count(),
                    DeviceStatus::DOWN => Device::where("status", DeviceStatus::DOWN)->count(),
                    DeviceStatus::WARNING => Device::where("status", DeviceStatus::WARNING)->count(),
                    DeviceStatus::UNUSUAL => Device::where("status", DeviceStatus::UNUSUAL)->count(),
                ],
            ]);
        });
    }
}
