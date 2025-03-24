<?php

namespace App\Models;

use App\Enums\DeviceStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

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
        $responseCPU = Http::withoutVerifying()->get("http://localhost:8888/api/table.json", [
            "page" => 1,
            "username" => "manager",
            "password" => "hgs_1qa@WS",
            "content" => "",
            "columns" => "device,sensor, objid, lastvalue, value, name,datetime,message,status",
            "filter_name" => "CPU Load",
        ]);

        foreach ($responseCPU->object()->{''} as $item) {
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
