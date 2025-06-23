<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Message extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    protected $domain;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->domain = config("app.env") === "local" ? "http://210.91.170.99:8080" : "http://10.0.1.252:8080";
    }

    public function device()
    {
        return $this->belongsTo(Device::class);
    }

    public function getMessages()
    {
        $response = Http::withoutVerifying()->get($this->domain . "/api/table.json", [
            "page" => 1,
            "username" => "manager",
            "password" => "hgs_1qa@WS",
            "content" => "messages",
            // "content" => "logs",
            // "content" => "messages",
            // "content" => "sensors",
            "columns" => "device,sensor, parent, type, objid, lastvalue, name,message,status, group,datetime, uptimetime,uptime,knowntime",
            "filter_type" => "",
            // "filter_type" => "SNMP Memory",
            // "filter_type" => "ping",
            // "filter_type" => "snmptraffic",
        ]);

        // ping, snmptraffic

        $items = [];

        $body = $response->json();

        if($body && isset($body["messages"]))
            $items = $body["messages"];

        return $items;
    }

    public static function record()
    {
        $messageModel = new Message();

        $messages = $messageModel->getMessages();

        $messages = collect($messages);

        foreach($messages as $message){
            $device = Device::where("title", $message["device_raw"])->first();

            $message["datetime"] = Carbon::make($message["datetime"])->format("Y-m-d H:i");

            Message::updateOrCreate([
                "device_id" => $device ? $device->id : null,
                "device_raw" => $message["device_raw"],
                "parent" => $message["parent"],
                "parent_raw" => $message["parent_raw"],
                "type" => $message["type"],
                "type_raw" => $message["type_raw"],
                "objid" => $message["objid"],
                "name" => $message["name"],
                "name_raw" => $message["name_raw"],
                "status" => $message["status"],
                "status_raw" => $message["status_raw"],
                "message" => $message["message"],
                "message_raw" => $message["message_raw"],
                "datetime" => $message["datetime"],
                "datetime_raw" => $message["datetime_raw"],
            ],[
                "device_id" => $device ? $device->id : null,
                "device_raw" => $message["device_raw"],
                "parent" => $message["parent"],
                "parent_raw" => $message["parent_raw"],
                "type" => $message["type"],
                "type_raw" => $message["type_raw"],
                "objid" => $message["objid"],
                "name" => $message["name"],
                "name_raw" => $message["name_raw"],
                "status" => $message["status"],
                "status_raw" => $message["status_raw"],
                "message" => $message["message"],
                "message_raw" => $message["message_raw"],
                "datetime" => $message["datetime"],
                "datetime_raw" => $message["datetime_raw"],
            ]);
        }
    }

}
