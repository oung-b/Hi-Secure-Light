<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Device;
use App\Models\Firewall;
use App\Models\FirewallApi;
use Illuminate\Http\Request;

class FirewallController extends ApiController
{
    public function dashboard()
    {
        $firewall = new Firewall();

        $result = [
            "count_malware" => $firewall->getCountMalware(),
            "count_ddos" => $firewall->getCountDdos(),
            "count_ips" => $firewall->getCountIps(),
            "traffics" => $firewall->getTopTraffices(),
            "cncs" => $firewall->getCnc(),
            "ipses" => $firewall->getIps(),
            "malwares" => $firewall->getAntiMalware()
        ];

        return $this->respondSuccessfully($result);
    }

    public function secureMonitoring()
    {
        $firewall = new Firewall();

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

        if($device)
            $tms["cpu_load_value"] = $device["cpu_load_value"];


        return $this->respondSuccessfully([
            "topAttacks" => $topAttacks,
            "topVictims" => $topVictims,
            "topAttackers" => $topAttackers,
            "topSources" => $topSources,
            "topDestinations" => $topDestinations,
            "tms" => $tms,
        ]);
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
    public function ipsIndex(Request $request)
    {
        $firewallApi = new FirewallApi();

        $items = $firewallApi->ipsIndex();

        return $this->respondSuccessfully($items);
    }
    public function ipsStore(Request $request)
    {
        $request->validate([
            "name" => "required",
            "type" => "required",
            "ip4_address" => "required",
            "ip4_prefix_host" => "required",
            "interface" => "required",
            "description" => "required",
            "zone" => "required",
        ]);

        $firewallApi = new FirewallApi();

        $firewallApi->ipsStore($request->all());

        return $this->respondSuccessfully();
    }
    public function ipsDestroy(Request $request)
    {
        $request->validate([
            "name" => "required",
        ]);

        $firewallApi = new FirewallApi();

        $firewallApi->ipsDestroy($request->all());

        return $this->respondSuccessfully();
    }
    public function natsIndex(Request $request)
    {
        $firewallApi = new FirewallApi();

        $items = $firewallApi->natsIndex();

        return $this->respondSuccessfully($items);
    }
    public function natsStore(Request $request)
    {
        $request->validate([
            "enable" => "required",
            "before_source_ip4_object" => "required",
            "before_destination_ip4_object" => "required",
            "before_service_object" => "required",
            "after_source_ip4_object" => "required",
            "after_destination_ip4_object" => "required",
            "after_sevice_object" => "required",
            "rule_number" => "required",
            "description" => "required",
            "reverse" => "required",
            "nat_id" => "required",
            "before_source_ip4_address" => "required",
            "before_destination_ip4_address" => "required",
            "after_source_ip4_address" => "required",
            "after_destination_ip4_address" => "required",
            "dynamic_blacklist_enable" => "required",
            "source_port_reuse_enable" => "required",
            "apply_flag" => "required",
        ]);

        $firewallApi = new FirewallApi();

        $firewallApi->natsStore($request->all());

        return $this->respondSuccessfully();
    }
    public function natsDestroy(Request $request)
    {
        $request->validate([
            "index" => "required",
        ]);

        $firewallApi = new FirewallApi();

        $firewallApi->natsDestroy($request->all());

        return $this->respondSuccessfully();
    }

}
