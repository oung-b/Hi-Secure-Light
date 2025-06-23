<?php

namespace App\Http\Controllers\Api;

use App\Enums\DeviceStatus;
use App\Http\Controllers\Controller;
use App\Models\Device;
use App\Models\History;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class HistoryController extends ApiController
{
    public function index(Request $request)
    {
        $request["take"] = $request->take ?? 30;

        $devices = Device::get();

        $realTimeTraffics = [];
        $rankingTraffics = [];

   /*     $firstHistory = $devices->first()
            ->histories()
            ->latest()
            ->first();*/

        $pivotDate = Carbon::now();

        $minute = Carbon::now()->minute;

        $nearestMinute =  $minute - ($minute % 5);

        $pivotDate = $pivotDate->setMinute($nearestMinute);

/*        if($firstHistory)
            $pivotDate = $firstHistory->logged_at;*/

        $trafficDevices = Device::whereIn("title", ["FW#1", "FW#2", "FW#3", "FW#4", "FW#5", "FW#6"])->get();

        foreach($trafficDevices as $device){
            Log::info('Device:', $device->toArray());
            $realTimeTraffics[] = [
                "device" => $device,
                "traffics" => [
                    $this->getByte($device, Carbon::make($pivotDate)->subMinutes(25)),
                    $this->getByte($device, Carbon::make($pivotDate)->subMinutes(20)),
                    $this->getByte($device, Carbon::make($pivotDate)->subMinutes(15)),
                    $this->getByte($device, Carbon::make($pivotDate)->subMinutes(10)),
                    $this->getByte($device, Carbon::make($pivotDate)->subMinutes(5)),
                    $this->getByte($device, Carbon::make($pivotDate)->subMinutes(0)),
                ]
            ];
        }

        // $realTimeNotifications = History::latest()->with("device")->take($request->take)->get();

        $today = Carbon::today();

        /*$histories = DB::table('histories')
            ->select('histories.device_id', 'devices.title', DB::raw('MAX(histories.byte) as total_byte'))
            ->join('devices', 'histories.device_id', '=', 'devices.id')
            ->whereDate('histories.created_at', $today)
            ->groupBy('histories.device_id', 'devices.title')
            ->orderByDesc('total_byte')
            ->get();*/

        $devices = Device::get();

        foreach($devices as $device){
            /*if($device->title == "FW#2" || $device->title == "FW#3" || $device->title == "FW#4" || $device->title == "FW#5" || $device->title == "FW#6")
                $device->status = "Down";*/

            $device->byte = $device->histories()
                ->where('created_at', '>=', Carbon::now()->subHours(24))
                ->where('created_at', '<', Carbon::now())
                ->sum("byte");

            $rankingTraffics[] = [
                "title" => $device->title,
                "byte" => $device->byte,
            ];
        }

        usort($rankingTraffics, function($a, $b) {return $b["byte"] - $a["byte"];});

        $returnData = [
            "devices" => $devices,
            // "realTimeNotifications" => $realTimeNotifications,
            "realTimeTraffics" => $realTimeTraffics,
            "rankingTraffics" => $rankingTraffics,
        ];

        return $this->respondSuccessfully($returnData);
    }

    public function getByte($device, $datetime)
    {
        /*$history = $device->histories()
                ->where("sensor", "LIKE", "%"."eth8"."%")
            ->where('logged_at', ">=", Carbon::make($datetime)->setSecond(0)->setMillisecond(0))
            ->where('logged_at', "<", Carbon::make($datetime)->addMinute()->setSecond(0)->setMillisecond(0))
            ->orderBy('byte', 'desc')
            ->first();*/

        $byte = $device->histories()
            // ->whereBetween('logged_at', [ Carbon::make($datetime)->subHours(3), Carbon::make($datetime)])
            // ->where("sensor", "LIKE", "%"."eth8"."%")
            ->where('logged_at', ">=", Carbon::make($datetime)->subMinutes(5)->setSecond(0)->setMillisecond(0))
            ->where('logged_at', "<", Carbon::make($datetime)->setSecond(0)->setMillisecond(0))
            ->average("byte");

        return [
            "byte" => $byte,
            "date" => Carbon::make($datetime)->format("H:i"),
        ];
    }

    public function store(Request $request)
    {
        History::record();

        return $this->respondSuccessfully();
    }

    public function update(Request $request)
    {
        $device = Device::where("title", $request->title)->first();

        if($device)
            $device->update(["status" => $request->status]);

        return $this->respondSuccessfully();
    }
}
