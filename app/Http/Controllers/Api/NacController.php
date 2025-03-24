<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Nac;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NacController extends ApiController
{
    protected $nac;

    public function __construct()
    {
        $this->nac = new Nac();
    }

    public function allows(Request $request)
    {
        $body = $this->nac->allows();

        return $this->respondSuccessfully($body);
    }

    public function blocks(Request $request)
    {
        $body = $this->nac->blocks();

        return $this->respondSuccessfully($body);
    }

    public function storeBlock(Request $request)
    {
        $request->validate([
            "ip" => "required|string|max:500",
            "mac" => "required|string|max:500",
        ]);

        $this->nac->storeBlock($request->ip, $request->mac);

        return $this->respondSuccessfully();
    }



    public function storeAllow(Request $request)
    {
        $request->validate([
            "ip" => "required|string|max:500",
            "mac" => "required|string|max:500",
        ]);

        $this->nac->storeAllow($request->ip, $request->mac);

        return $this->respondSuccessfully();
    }

    public function nodes(Request $request)
    {
        $client = new Client([
            "verify" => false
        ]);

        $response = Http::withoutVerifying()->get("https://10.0.1.109:9554/mc2/rest/nodes?page=1&pageSize=30&view=node&nid=All&apiKey=26f59d5e-ffac-4e5b-b5b1-6251f57b89b3");

        $body = $response->json();

        return $this->respondSuccessfully($body);
    }

    public function ips(Request $request)
    {
        $client = new Client([
            "verify" => false
        ]);

        $response = Http::withoutVerifying()->get("https://10.0.1.109:9554/mc2/rest/nodes?page=1&pageSize=30&view=node&nid=All&ipEqual=false&ip=192.168.0.31&macEqual=false&apiKey=26f59d5e-ffac-4e5b-b5b1-6251f57b89b3");

        $body = $response->json();

        return $this->respondSuccessfully($body);
    }

    public function wlan(Request $request)
    {
        $client = new Client([
            "verify" => false
        ]);

        $response = Http::withoutVerifying()->get("https://10.0.1.109:9554/mc2/rest/aps?page=1&pageSize=30&dupDetect=false&apiKey=26f59d5e-ffac-4e5b-b5b1-6251f57b89b3");

        $body = $response->json();

        return $this->respondSuccessfully($body);
    }

    public function log(Request $request)
    {
        $client = new Client([
            "verify" => false
        ]);

        $response = Http::withoutVerifying()->get("https://10.0.1.109:9554/mc2/rest/logs?page=1&pageSize=30&logschema=auditlog&periodType=custom&apiKey=26f59d5e-ffac-4e5b-b5b1-6251f57b89b3");

        $body = $response->json();

        return $this->respondSuccessfully($body);
    }

    public function condition(Request $request)
    {
        $client = new Client([
            "verify" => false
        ]);

        $response = Http::withoutVerifying()->get("https://10.0.1.109:9554/mc2/rest/systems/e2c16ea8-a292-103c-8001-0cc47a736510/cpu&apiKey=26f59d5e-ffac-4e5b-b5b1-6251f57b89b3");

        $body = $response->json();

        return $this->respondSuccessfully($body);
    }

}
