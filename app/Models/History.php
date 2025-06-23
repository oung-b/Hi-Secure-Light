<?php

namespace App\Models;

use App\Enums\DeviceStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class History extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    protected $domain;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->domain = config("app.env") === "local" ? "http://210.91.170.99:8080" : "http://10.0.1.252:8888";
    }

    public function device()
    {
        return $this->belongsTo(Device::class);
    }

    public static function record()
    {
        $history = new History();

        \App\Models\History::where("created_at", "<=", \Carbon\Carbon::now()->subYears(1))->delete();

        $response = Http::withoutVerifying()->get($history->domain."/api/table.json", [
            "page" => 1,
            "username" => "manager",
            "password" => "hgs_1qa@WS",
            "content" => "",
            "columns" => "device,sensor, objid, lastvalue, name,datetime,message,status",
            "filter_type" => "snmptraffic",
        ]);

        $body = $response->json();

        if($body){
            $items = $body[""];

            foreach($items as $item){
                $device = \App\Models\Device::where("title", $item["device_raw"])->first();

                if($device) {
                    $history = \App\Models\History::create([
                        "device_id" => $device->id,
                        "message" => $item["message_raw"],
                        "status" => $item["status"],
                        "byte" => floor((float) $item["lastvalue_raw"]),
                        "sensor" => $item["sensor_raw"],
                        "logged_at" => Carbon::make($items[0]["datetime"]),
                    ]);
                }
            }
        }
    }

    public static function recordPing()
    {
        $history = new History();

        $responsePing = Http::withoutVerifying()->get("{$history->domain}/api/table.json", [
            "page" => 1,
            "username" => "manager",
            "password" => "hgs_1qa@WS",
            "content" => "",
            "columns" => "device,sensor, objid, lastvalue, value, name,datetime,message,status",
            "filter_name" => "Ping",
        ]);

        foreach ($responsePing->object()->{''} as $item) {
            $device = Device::where("title", $item->device_raw)->first();

            if($device && $item->status)
                $device->update(["status" => $item->status]);
        }
    }
}
