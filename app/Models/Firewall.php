<?php

namespace App\Models;

use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Firewall extends Model
{
    use HasFactory;

    protected $client;

    protected $domain;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->client = new Client([
            "verify" => false,
            'headers' => [
                'Accept' => 'application/json',
                "viewId" => "manager",
                "apikey" => "9cca64cc626fe90094b6432172e50351"
            ],
        ]);

        $this->domain = config("app.env") === "production" ? "https://10.0.1.251:58005" : "https://118.130.110.156:40007";
    }

    public function getCountMalware()
    {
        $start = Carbon::now()->subHours(24)->format('Y-m-d\TH:i:s');
        $end = Carbon::now()->format('Y-m-d\TH:i:s');

        $response = $this->client->request("get", "{$this->domain}/restapi/tm/v1/log/search?searchType=CUSTOM&startDate={$start}&endDate={$end}&pageSize=1&pageNo=1&query=module:malwareBlock");

        return json_decode($response->getBody(), true)["objects"][0]["count"];
    }

    public function getCountIps()
    {
        $start = Carbon::now()->subHours(24)->format('Y-m-d\TH:i:s');
        $end = Carbon::now()->format('Y-m-d\TH:i:s');

        $response = $this->client->request("get", "{$this->domain}/restapi/tm/v1/log/search?searchType=CUSTOM&startDate={$start}&endDate={$end}&pageSize=1&pageNo=1&query=module:tgIps");

        return json_decode($response->getBody(), true)["objects"][0]["count"];
    }

    public function getCountDdos()
    {
        $start = Carbon::now()->subHours(24)->format('Y-m-d\TH:i:s');
        $end = Carbon::now()->format('Y-m-d\TH:i:s');

        $response = $this->client->request("get", "{$this->domain}/restapi/tm/v1/log/search?searchType=CUSTOM&startDate={$start}&endDate={$end}&pageSize=1&pageNo=1&query=module:tgIps and group:DDoS");

        return json_decode($response->getBody(), true)["objects"][0]["count"];
    }

    public function getTraffics($device = "FW_1")
    {
        $start = Carbon::now()->subHours(24)->format('Y-m-d\TH:i:s');
        $end = Carbon::now()->format('Y-m-d\TH:i:s');
        $response = $this->client->request("get", "{$this->domain}/restapi/tm/v1/log/aggregate/top?searchType=CUSTOM&startDate={$start}&endDate={$end}&criteria=sip&attribute=rxbyte&query=devicename:{$device} and type:firewall&groupBySort=SUM");


        $items = json_decode($response->getBody(), true)["objects"][0]["results"][0];

        array_walk($items, function (&$item) {
            $item["avg"] = round($item["avg"] / 1024, 1);
        });

        return $items;
    }

    public function getTopTraffices()
    {
        $items = $this->getTraffics("FW_1");
        array_merge($items, $this->getTraffics("FW_2"));
        array_merge($items, $this->getTraffics("FW_3"));
        array_merge($items, $this->getTraffics("FW_4"));
        array_merge($items, $this->getTraffics("FW_5"));
        array_merge($items, $this->getTraffics("FW_6"));

        usort($items, function ($a, $b) {
            return $b["avg"] <=> $a["avg"];
        });

        $items = array_slice($items, 0, 10);

        return $items;
    }

    public function getIps()
    {
        $start = Carbon::now()->subHours(24)->format('Y-m-d\TH:i:s');
        $end = Carbon::now()->format('Y-m-d\TH:i:s');

        $response = $this->client->request("get", "{$this->domain}/restapi/tm/v1/log/aggregate/top?searchType=CUSTOM&startDate={$start}&endDate={$end}&criteria=sip,attackname&query=module:tgIps");

        return json_decode($response->getBody(), true)["objects"][0]["results"][0];
    }

    public function getAntiMalware()
    {
        $start = Carbon::now()->subHours(24)->format('Y-m-d\TH:i:s');
        $end = Carbon::now()->format('Y-m-d\TH:i:s');

        $response = $this->client->request("get", "{$this->domain}/restapi/tm/v1/log/search?searchType=CUSTOM&startDate={$start}&endDate={$end}&pageSize=1&pageNo=1&query=module%3AmalwareBlock&limit=0&reverse=true");

        return json_decode($response->getBody(), true)["objects"][0]["results"];
    }

    public function getCnc()
    {
        // $start = Carbon::now()->subHours(30)->format('Y-m-d\TH:i:s');
        $start = Carbon::now()->subHours(24)->format('Y-m-d\TH:i:s');
        $end = Carbon::now()->format('Y-m-d\TH:i:s');

        // $response = $this->client->request("get", "{$this->domain}/restapi/tm/v1/log/aggregate/top?searchType=CUSTOM&startDate={$start}&endDate={$end}&criteria=sip&query=module:tgCnc and devicename={$device}}");
        $response = $this->client->request("get", "{$this->domain}/restapi/tm/v1/log/aggregate/top?searchType=CUSTOM&startDate={$start}&endDate={$end}&criteria=sip,dip&query=module:tgCnc");

        $items = json_decode($response->getBody(), true)["objects"][0]["results"][0];

        foreach ($items as &$item) {
            // "key"에서 IP 주소 추출
            $matches = explode("/_/", $item["key"]);

            if (count($matches) == 2) {
                // 추출된 IP 주소를 배열에 추가
                $item["sip"] = $matches[0];
                $item["dip"] = $matches[1];
            } else {
                // 일치하지 않으면 기본값 설정 또는 처리 로직 추가
                $item["sip"] = "";
                $item["dip"] = "";
            }
        }

        return $items;
    }

    public function getTopCnc()
    {
        $items = [
            [
                "title" => "FW_1",
                "count" => $this->getCnc("FW_1"),
            ],
            [
                "title" => "FW_2",
                "count" => $this->getCnc("FW_2"),
            ],
            [
                "title" => "FW_3",
                "count" => $this->getCnc("FW_3"),
            ],
            [
                "title" => "FW_4",
                "count" => $this->getCnc("FW_4"),
            ],
            [
                "title" => "FW_5",
                "count" => $this->getCnc("FW_5"),
            ],
            [
                "title" => "FW_6",
                "count" => $this->getCnc("FW_6"),
            ],
        ];


    }

    public function getDashBoardTopAttack()
    {
        $start = Carbon::now()->subHours(24)->format('Y-m-d\TH:i:s');
        $end = Carbon::now()->format('Y-m-d\TH:i:s');
        $response = $this->client->request("get", "{$this->domain}/restapi/tm/v1/log/aggregate/top?searchType=CUSTOM&startDate={$start}&endDate={$end}&criteria=attackname&query=module:tgIps");
        return json_decode($response->getBody(), true)["objects"][0];
    }

    public function getDashBoardTopVictim()
    {
        $start = Carbon::now()->subHours(24)->format('Y-m-d\TH:i:s');
        $end = Carbon::now()->format('Y-m-d\TH:i:s');
        $response = $this->client->request("get", "{$this->domain}/restapi/tm/v1/log/aggregate/top?searchType=CUSTOM&startDate={$start}&endDate={$end}&criteria=dip&query=module:tgIps");
        return json_decode($response->getBody(), true)["objects"][0];
    }

    public function getDashBoardTopAttacker()
    {
        $start = Carbon::now()->subHours(24)->format('Y-m-d\TH:i:s');
        $end = Carbon::now()->format('Y-m-d\TH:i:s');
        $response = $this->client->request("get", "{$this->domain}/restapi/tm/v1/log/aggregate/top?searchType=CUSTOM&startDate={$start}&endDate={$end}&criteria=sip&query=module:tgIps");
        return json_decode($response->getBody(), true)["objects"][0];
    }

    public function getDashBoardTopSource()
    {
        $start = Carbon::now()->subHours(24)->format('Y-m-d\TH:i:s');
        $end = Carbon::now()->format('Y-m-d\TH:i:s');
        $response = $this->client->request("get", "{$this->domain}/restapi/tm/v1/log/aggregate/top?searchType=CUSTOM&startDate={$start}&endDate={$end}&criteria=sip&attribute=rxbyte,txbyte&query=type:firewall&groupBysort=sum");
        return json_decode($response->getBody(), true)["objects"][0];
    }

    public function getDashBoardTopDestination()
    {
        $start = Carbon::now()->subHours(24)->format('Y-m-d\TH:i:s');
        $end = Carbon::now()->format('Y-m-d\TH:i:s');
        $response = $this->client->request("get", "{$this->domain}/restapi/tm/v1/log/aggregate/top?searchType=CUSTOM&startDate={$start}&endDate={$end}&criteria=dip&attribute=rxbyte,txbyte&query=type:firewall&groupBysort=sum");
        return json_decode($response->getBody(), true)["objects"][0];
    }

    public function getDashboardTms()
    {
        $response = $this->client->request("get", "{$this->domain}/restapi/tm/v1/log/aggregate/top?searchType=DAY&criteria=devicename&query=AND NOT device:TMS");
        return json_decode($response->getBody(), true)["objects"][0];
    }
}
