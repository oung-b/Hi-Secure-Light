<?php

namespace App\Models;

use App\Enums\DeviceStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class Device extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    protected $appends = ["totalStatus"];

    public function histories()
    {
        return $this->hasMany(History::class);
    }

    public function devices()
    {
        return $this->hasMany(Device::class);
    }

    public function getTotalStatusAttribute()
    {
        $status = $this->status;

        // 소속 device중에 부모 device 상태와 다른게 있다면
        if($this->devices()->where("status", "!=", $this->status)->count() > 0){
            $childDevice = $this->devices()->where("status", "!=", $this->status)->first();

            $status = $childDevice->status;
        }

        return $status;
    }

    public static function record()
    {
        $domain = config("app.env") === "local" ? "http://210.91.170.99:8080" : "http://10.0.1.252:8080";
        $responseCPU = Http::withoutVerifying()->get($domain . "/api/table.json", [
            "page" => 1,
            "username" => "manager",
            "password" => "hgs_1qa@WS",
            "content" => "",
            "columns" => "device,sensor, objid, lastvalue, value, name,datetime,message,status",
            "filter_name" => "CPU Load",
        ]);

        // API 응답 로그 출력
        Log::info("API Response for CPU Load", [
            'response_body' => $responseCPU->json(),
            'status_code' => $responseCPU->status()
        ]);

        foreach ($responseCPU->object()->{''} as $item) {
            // 각 아이템의 상세 로그 출력
            Log::info("Device CPU Load Update", [
                'device_title' => $item->device_raw,
                'cpu_value' => $item->value_raw,
                'api_status' => $item->status ?? 'null',
                'full_item' => $item
            ]);

            if ($item->value_raw !== '') {
                Device::updateOrCreate(
                    ['title' => $item->device_raw],
                    ['title' => $item->device_raw, 'cpu_load_value' => $item->value_raw]
                );
            }
        }
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function statusHistories()
    {
        return $this->hasMany(StatusHistory::class);
    }
}
