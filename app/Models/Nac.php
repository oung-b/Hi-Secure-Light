<?php

namespace App\Models;

use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Nac extends Model
{
    use HasFactory;

    protected $client;
    protected $domain = "https://10.0.1.109:9554/mc2/rest";
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->client = new Client([
            "verify" => false
        ]);

    }

    public function blocks()
    {
        $client = new Client([
            "verify" => false
        ]);
        $response = $this->client->request('get', "https://10.0.1.109:9554/mc2/rest/nodes?page=1&pageSize=30&view=node&nid=All&roleid=11&ipEqual=false&macEqual=false&apiKey=26f59d5e-ffac-4e5b-b5b1-6251f57b89b3");

        return json_decode($response->getBody()->getContents());
    }

    public function storeBlock($ip, $mac)
    {
        $response = $this->client->request('put', "https://10.0.1.109:9554/mc2/rest/ip/policies?&apiKey=26f59d5e-ffac-4e5b-b5b1-6251f57b89b3",[
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json;charset=UTF-8',
            ],
            'json' => [
                [
                    "cmd" => "ipdeny",
                    "targetIP" => $ip,
                    "specifyMACs" => ["string"],
                    "extraLogInfo" => "string"
                ]
            ],
        ]);

        $response = $this->client->request('put', "https://10.0.1.109:9554/mc2/rest/mac/policies?&apiKey=26f59d5e-ffac-4e5b-b5b1-6251f57b89b3",[
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json;charset=UTF-8',
            ],
            'json' => [
                [
                    "cmd" => "macdeny",
                    "targetMAC" => $mac,
                    "specifyIPs" => ["string"],
                    // "extraLogInfo" => "string"
                ]
            ],
        ]);

        return json_decode($response->getBody()->getContents());
    }

    public function storeAllow($ip, $mac)
    {
        $response = $this->client->request('put', "https://10.0.1.109:9554/mc2/rest/ip/policies?&apiKey=26f59d5e-ffac-4e5b-b5b1-6251f57b89b3",[
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json;charset=UTF-8',
            ],
            'json' => [
                [
                    "cmd" => "ipallow",
                    "targetIP" => $ip,
                    "specifyMACs" => ["string"],
                    "extraLogInfo" => "string"
                ]
            ],
        ]);

        $response = $this->client->request('put', "https://10.0.1.109:9554/mc2/rest/mac/policies?&apiKey=26f59d5e-ffac-4e5b-b5b1-6251f57b89b3",[
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json;charset=UTF-8',
            ],
            'json' => [
                [
                    "cmd" => "macallow",
                    "targetMAC" => $mac,
                    "specifyIPs" => ["string"],
                    // "extraLogInfo" => "string"
                ]
            ],
        ]);

        return json_decode($response->getBody()->getContents());
    }

    public function allows()
    {
        $response = $this->client->request('get', "https://10.0.1.109:9554/mc2/rest/nodes?page=1&pageSize=30&view=node&nid=All&roleid=65500&ipEqual=false&macEqual=false&apiKey=26f59d5e-ffac-4e5b-b5b1-6251f57b89b3");

        return json_decode($response->getBody()->getContents());
    }
}
