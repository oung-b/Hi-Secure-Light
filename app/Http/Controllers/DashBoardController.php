<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Firewall;
use App\Models\Hardware;
use App\Models\Message;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class DashBoardController extends Controller
{
        public function index()
    {
        $messages = Message::orderBy("datetime", "desc")->whereIn("status", ["Up", "Down", "Unusual", "Warning"])->take(100)->get();

        return view('user.dash-board.dashboard_index', [
            "messages" => $messages
        ]);
    }

    public function securityMonitoring()
    {
        /*$firewall = new Firewall();

        $topAttacks = $firewall->getDashBoardTopAttack()["results"][0];
        $topAttacks = $this->recordPercentage($topAttacks);

        $topVictims = $firewall->getDashBoardTopVictim()["results"][0];
        $topVictims = $this->recordPercentage($topVictims);

        $topAttackers = $firewall->getDashBoardTopAttacker()["results"][0];
        $topAttackers = $this->recordPercentage($topAttackers);

        $topSources = $firewall->getDashBoardTopSource()["results"][0];
        $topSources = $this->recordPercentage($topSources);

        $topDestinations = $firewall->getDashBoardTopDestination()["results"][0];
        $topDestinations = $this->recordPercentage($topDestinations);

        $tms = [
            "count" => 0,
            "cpu_load_value" => 0,
        ];

        // TMS(device를 TMS로 지정하면 Firewall 전체 기기들 값이 넘어오는듯함)
        $firewalls = $firewall->getDashboardTms()["results"][0];

        foreach($firewalls as $firewall){
            $tms["count"] += $firewall["count"];
        }

        Device::record();

        $device = Device::where("title", "TMS")->first();

        if($device) {

            $tms["cpu_load_value"] = $device["cpu_load_value"];
        }
        return view('user.dash-board.security_monitoring', [
            "topAttacks" => $topAttacks,
            "topVictims" => $topVictims,
            "topAttackers" => $topAttackers,
            "topSources" => $topSources,
            "topDestinations" => $topDestinations,
            "tms" => $tms,
        ]);
        */

        $response = Http::get("http://hi-secure.ufeed.co.kr/api/firewalls/secureMonitoring")->body();

        return view('user.dash-board.security_monitoring', json_decode($response, true)["data"]);
    }

    public function recordPercentage($items)
    {
        $total = 0;

        $result = [];

        foreach($items as $item){
            $total += $item["count"];
        }

        foreach($items as $item){
            $item["percentage"] = round($item["count"] / $total * 100, 2);

            $result[] = $item;
        }

        return $result;
    }

    public function getDetailDashboardInfo($totalDevices)
    {
        $counts = [
            "Up" => 0,
            "Down" => 0,
            "Warning" => 0,
            "Unusual" => 0,
        ];

        $countsByDates = [
            [
                "date" => Carbon::now()->subDays(3)->format("Y-m-d H:i"),
                "title" => Carbon::now()->subDays(3)->format("m/d"),
                "Up" => 0,
                "Down" => 0,
                "Warning" => 0,
                "Unusual" => 0,
            ],
            [
                "date" => Carbon::now()->subDays(2)->format("Y-m-d H:i"),
                "title" => Carbon::now()->subDays(2)->format("m/d"),
                "Up" => 0,
                "Down" => 0,
                "Warning" => 0,
                "Unusual" => 0,
            ],
            [
                "date" => Carbon::now()->subDays(1)->format("Y-m-d H:i"),
                "title" => Carbon::now()->subDays(1)->format("m/d"),
                "Up" => 0,
                "Down" => 0,
                "Warning" => 0,
                "Unusual" => 0,
            ],
            [
                "date" => Carbon::now()->format("Y-m-d H:i"),
                "title" => Carbon::now()->format("m/d"),
                "Up" => 0,
                "Down" => 0,
                "Warning" => 0,
                "Unusual" => 0,
            ],
        ];

        foreach($totalDevices as $index => $device){
            foreach($device["childDevices"] as $childDevice){
                if($childDevice->status != "Up") {
                    $device["count_wrong"] += 1;

                    $device["status"] = "down";

                    $totalDevices[$index] = $device;
                }

                if(isset($counts[$childDevice->status]))
                    $counts[$childDevice->status] += 1;

                foreach($countsByDates as $countsIndex => $countsByDate){
                    $statusHistory = $childDevice->statusHistories()
                        ->where("created_at", ">=", Carbon::make($countsByDate["date"])->startOfDay())
                        ->where("created_at", "<=", Carbon::make($countsByDate["date"])->endOfDay())
                        ->first();

                    if($statusHistory && isset($countsByDates[$countsIndex][$statusHistory->status]))
                        $countsByDates[$countsIndex][$statusHistory->status] +=1;
                }
            }
        }

        return [
            "totalDevices" => $totalDevices,
            "counts" => $counts,
            "countsByDates" => $countsByDates
        ];
    }

    public function icmsZone()
    {
        $totalDevices = [
            [
                "title" => "ICMS System",
                "count_wrong" => 0,
                "status" => "Up",
                "childDevices" => [
                    Device::where("title", "SW#1")->first(),
                    Device::where("title", "SW#2")->first(),
                    Device::where("title", "OWS1")->first(),
                    Device::where("title", "OWS2")->first(),
                ]
            ]
        ];

        $data = $this->getDetailDashboardInfo($totalDevices);

        return view('user.dash-board.dashboard_detail_nz', $data);
    }

    public function propulsionZone()
    {
        $totalDevices = [
            [
                "title" => "M/E System",
                "count_wrong" => 0,
                "status" => "Up",
                "childDevices" => [
                    Device::where("title", "EMS MOP#1")->first(),
                    Device::where("title", "EMS MOP#2")->first(),
                ]
            ],
//            [
//                "title" => "VSAT",
//                "count_wrong" => 0,
//                "status" => "Up",
//                "childDevices" => [
//                    Device::where("title", "Switch")->first()
//                ]
//            ]
        ];

        $data = $this->getDetailDashboardInfo($totalDevices);

        return view('user.dash-board.dashboard_detail_cz', $data);
    }

    public function dmzZone()
    {
        $totalDevices = [
            [
                "title" => "RMS System",
                "count_wrong" => 0,
                "status" => "Up",
                "childDevices" => [
                    Device::where("title", "RMS")->first()
                ]
            ],
//            [
//                "title" => "Refeer Container Monitoring System",
//                "count_wrong" => 0,
//                "status" => "Up",
//                "childDevices" => [
//                    Device::where("title", "R.C.M.S COMPUTER")->first()
//                ]
//            ]
        ];

        $data = $this->getDetailDashboardInfo($totalDevices);

        return view('user.dash-board.dashboard_detail_pz', $data);
    }

    public function InternalCommZone()
    {
        $totalDevices = [
            [
                "title" => "Internal comm System",
                "count_wrong" => 0,
                "status" => "Up",
                "childDevices" => [
                    Device::where("title", "Office PC")->first()
                ]
            ],
//            [
//                "title" => "Notebook",
//                "count_wrong" => 0,
//                "status" => "Up",
//                "childDevices" => [
//                    Device::where("title", "Notebook#1")->first()
//                ]
//            ]
        ];

        $data = $this->getDetailDashboardInfo($totalDevices);

        return view('user.dash-board.dashboard_detail_clz', $data);
    }

    public function navigationRadioZone()
    {
        $totalDevices = [
            [
                "title" => "ECDIS System",
                "count_wrong" => 0,
                "status" => "Up",
                "childDevices" => [
                    Device::where("title", "NO.1 ECDIS")->first()
                ]
            ],
        ];

//        $hardwares = Hardware::whereHas('system.category', function ($query) {
//            $query->where('name', 'Control & Instrumentation');
//        })->with(['system', 'device'])->get()->groupBy('system.name');
//        $totalDevices = [];
//        foreach ($hardwares as $systemName => $hardwareGroup) {
//            $childDevices = [];
//            foreach ($hardwareGroup as $hardware) {
//                $childDevices[] = $hardware->device;
//            }
//
//            $totalDevices[] = [
//                "title" => $systemName,
//                "count_wrong" => 0,
//                "status" => "Up",
//                "childDevices" => $childDevices
//            ];
//        }

        $data = $this->getDetailDashboardInfo($totalDevices);

        return view('user.dash-board.dashboard_detail_ciz', $data);
    }
}
