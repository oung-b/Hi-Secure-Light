<?php

namespace App\Models;

use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;

class FirewallApi extends Model
{
    use HasFactory;

    // check-point 방화벽
    private $id = 'manager';
    private $password = 'hms_1qa2ws';
    private $header_key = 'X-chkp-sid';

    private $script_outgoing = 'show access-rules type outgoing';
    private $script_incoming = 'show access-rules type incoming-internal-and-vpn';
    private $script_interface = 'show interfaces';

    protected $client;

    protected $token;

    protected $domain;

    public function __construct(array $attributes = [], $domain = null)
    {
        parent::__construct($attributes);

        if($domain !== null) {
            $this->domain = $domain;
        }

        // Laravel Http 클라이언트를 생성, verity 옵션을 false로 설정하여 ssl 인증서를 검증하지 않도록 한다.
        // 그렇게 만들어진 Http 인스턴스를 $client변수에 저장
        $this->client = Http::withOptions([
            'verify' => false
        ]);

        $this->login();
    }

    // 로그인
    public function login()
    {
        $this->token = $this->client->withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ])->post($this->domain . "/login", [
            'user' => $this->id,
            'password' => $this->password
        ])->json()['sid'];
    }

    // 로그아웃
    public function logout()
    {
        $this->client->withHeaders([
            $this->header_key => $this->token,
        ])->post($this->domain . "/logout");
    }

    // 텍스트 테이블 데이터를 JSON 형식으로 변환
    public function textTableDataToJson($decodeData)
    {
        // 텍스트 테이블을 배열로 변환(테이블 형태의 텍스트 데이터로 되어있음)
        $lines = explode("\n", trim($decodeData));
        $jsonDatas = [];

        // 헤더 추출 (2번째 줄에서 '|'로 구분하여 추출)
        if (count($lines) >= 2) {
            $headerLine = $lines[1]; // 헤더 줄
            $headers = [];
            $headerParts = explode('|', $headerLine);

            foreach ($headerParts as $part) {
                $part = trim($part);
                if (!empty($part)) {
                    $headers[] = $part;
                }
            }

            // 데이터 행 추출 (4번째 줄부터 마지막 구분선 전까지)
            for ($i = 3; $i < count($lines) - 1; $i++) {
                if (strpos($lines[$i], '-----------') === false) { // 구분선 제외
                    $rowData = [];
                    $rowParts = explode('|', $lines[$i]);
                    $colIndex = 0;

                    foreach ($rowParts as $part) {
                        $part = trim($part);
                        if (!empty($part) && isset($headers[$colIndex])) {
                            $rowData[$headers[$colIndex]] = $part;
                            $colIndex++;
                        }
                    }

                    if (!empty($rowData)) {
                        $jsonDatas[] = $rowData;
                    }
                }
            }
        }

        return $jsonDatas;
    }

    // 텍스트 키:값 데이터를 json 형식으로 변환
    public function textKeyValueToJson($decodeData)
    {
        $arrayDatas = explode("\n", trim($decodeData));

        $dataArray = [];

        foreach ($arrayDatas as $arrayData) {
            // 키와 값 분리
            if (preg_match('/^([^:]+):\s*(.*)$/', $arrayData, $matches)) {
                $key = trim($matches[1]);
                $value = trim($matches[2]);
                $dataArray[$key] = $value;
            }
        }

        return $dataArray;
    }

    // 텍스트 키:값 데이터를 json list 형식으로 변환
    function textKeyValueToJsonList($rawData) {
        $lines = explode("\n", $rawData);
        $result = [];
        $currentInterface = null;

        foreach ($lines as $line) {
            $line = trim($line);

            // 빈 줄은 건너뜁니다
            if (empty($line)) {
                continue;
            }

            // 키:값 형식 파싱
            if (preg_match('/^([^:]+):\s*(.*)$/', $line, $matches)) {
                $key = trim($matches[1]);
                $value = trim($matches[2]);

                // name 키를 만나면 새 인터페이스 시작
                if ($key === 'name') {
                    $currentInterface = $value;
                    $result[$currentInterface] = [
                        'name' => $value,
                        'ipv4-address' => '',
                        'status' => ''
                    ];
                }
                // 현재 인터페이스에 속성 추가
                elseif ($currentInterface !== null && isset($result[$currentInterface])) {
                    $result[$currentInterface][$key] = $value;
                }
            }
        }

        // 배열의 값들만 반환 (인덱스 배열로 변환)
        return array_values($result);
    }

    // 아웃고잉 정책 조회
    public function outgoingPolicy()
    {
        $response = $this->client->withHeaders([
            $this->header_key => $this->token,
        ])->post($this->domain . "/run-clish-command", [
            'script' => base64_encode($this->script_outgoing)
        ]);

        $decodeData = base64_decode($response->json()['output']);

        // 텍스트 테이블 데이터이기 때문에 json으로 변환
        $jsonData = $this->textTableDataToJson($decodeData);

        return $jsonData;
    }

    // 인바운드 정책 조회
    public function incomingPolicy()
    {
        $response = $this->client->withHeaders([
            $this->header_key => $this->token,
        ])->post($this->domain . "/run-clish-command", [
            'script' => base64_encode($this->script_incoming)
        ]);

        $decodeData = base64_decode($response->json()['output']);

        // 텍스트 테이블 데이터이기 때문에 json으로 변환
        $jsonData = $this->textTableDataToJson($decodeData);

        return $jsonData;
    }

    // 정책에 대한 관련 정보들 요청
    public function policyIndex()
    {
        $outgoingPolicy = $this->outgoingPolicy();
        $incomingPolicy = $this->incomingPolicy();

        $this->logout();

        $jsonData = [
            'outgoing' => $outgoingPolicy,
            'incoming' => $incomingPolicy
        ];

        return $jsonData;
    }

    // 정책 추가
    public function policyStore($data)
    {
        //add access-rule type {outgoing} position 1 name {name} source {Spark} destination {Joon} service {HTTP} action {accept}
        $script = "add access-rule type {$data['policyType']} position 1 name {$data['name']} source {$data['source']} destination {$data['destination']} service {$data['service']} action {$data['action']}";
        $response = $this->client->withHeaders([
            $this->header_key => $this->token,
        ])->post($this->domain . "/run-clish-command", [
            'script' => base64_encode($script)
        ]);

        $this->logout();

        if ($response->json('output') !== "") {
            $errorMessage = base64_decode($response->json('output'));
            throw ValidationException::withMessages([
                'firewall' => $errorMessage
            ]);
        }
    }

    // 정책 조회
    public function policyShow($data)
    {
        $script = "show access-rule type {$data['policyType']} position {$data['no']}";
        $response = $this->client->withHeaders([
            $this->header_key => $this->token,
        ])->post($this->domain . "/run-clish-command", [
            'script' => base64_encode($script)
        ]);

        $this->logout();

        $decodeData = base64_decode($response->json()['output']);

        $dataArray = $this->textKeyValueToJson($decodeData);

        return $dataArray;
    }

    public function policyUpdate($data)
    {
        $script = "set access-rule type {$data['policyType']} position {$data['no']} source {$data['source']} destination {$data['destination']} service {$data['service']} action {$data['action']}";
        $response = $this->client->withHeaders([
            $this->header_key => $this->token,
        ])->post($this->domain . "/run-clish-command", [
            'script' => base64_encode($script)
        ]);

        $this->logout();

        if ($response->json('output') !== "") {
            $errorMessage = base64_decode($response->json('output'));
            throw ValidationException::withMessages([
                'firewall' => $response->json('message')
            ]);
        }

        return $response->json();
    }

    public function policyEnableDisable($data)
    {
        $status = ($data['status'] == 'Enabled') ? 'true' : 'false';
        $script = "set access-rule type {$data['policyType']} position {$data['no']} disabled {$status}";
        $response = $this->client->withHeaders([
            $this->header_key => $this->token,
        ])->post($this->domain . "/run-clish-command", [
            'script' => base64_encode($script)
        ]);

        $this->logout();

        if ($response->json('output') !== "") {
            $errorMessage = base64_decode($response->json('output'));
            throw ValidationException::withMessages([
                'firewall' => $response->json('message')
            ]);
        }

        return $response->json();
    }

    public function policyDestroy($data)
    {
        Log::info($data);
        $script = "delete access-rule type {$data['policyType']} position {$data['no']}";
        $response = $this->client->withHeaders([
            $this->header_key => $this->token,
        ])->post($this->domain . "/run-clish-command", [
            'script' => base64_encode($script)
        ]);

        $this->logout();

        if ($response->json('output') !== "") {
            $errorMessage = base64_decode($response->json('output'));
            throw ValidationException::withMessages([
                'firewall' => $errorMessage
            ]);
        }

        return $response->json();
    }

    public function interfaceIndex()
    {
        $response = $this->client->withHeaders([
            $this->header_key => $this->token,
        ])->post($this->domain . "/run-clish-command", [
            'script' => base64_encode($this->script_interface)
        ]);

        $this->logout();

        $decodeData = base64_decode($response->json()['output']);

        $dataArray = $this->textKeyValueToJsonList($decodeData);

        return $dataArray;
    }

    public function interfaceShow($data)
    {
        $response = $this->client->withBody(json_encode($data), 'application/json')->get($this->domain . "/network/interface/interface/enable");

        $this->logout();

        return $response->json('result.0');
    }

    public function interfaceUpdate($data)
    {
        $status = ($data['status'] == 'off') ? 'on' : 'off';
        $script = "set interface {$data['name']} state {$status}";
        $response = $this->client->withHeaders([
            $this->header_key => $this->token,
        ])->post($this->domain . "/run-clish-command", [
            'script' => base64_encode($script)
        ]);

        $this->logout();

        if ($response->json('output') !== "") {
            $errorMessage = base64_decode($response->json('output'));
            throw ValidationException::withMessages([
                'firewall' => $errorMessage
            ]);
        }

        return $response->json();
    }

    public function ipsIndex()
    {
//        $response = $this->client->request("get",$this->domain."/object/ip_address/ipv4_address", [
//            'headers' => [
//                'Accept' => 'application/json',
//                'Content-Type' => 'application/json;charset=UTF-8',
//                "Authorization" => $this->token,
//            ],
//
//            "json" => [
//
//            ]
//        ]);
        $response = $this->client->get($this->domain . "/object/ip_address/ipv4_address");

        $this->logout();

        return $response->json()["result"];
    }

    public function ipsStore($data)
    {
        $response = $this->client->request("post",$this->domain."/object/ip_address/ipv4_address", [
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json;charset=UTF-8',
                "Authorization" => $this->token,
            ],

            "json" => [
                $data
            ]

            /*{
                "name": "Test",
                "type": "0",
                "ip4_address": "77.77.77.100",
                "ip4_prefix_host": "32",
                "interface": "all",
                "description": "설명을 입력해주세요",
                "zone": "ALL"
            }*/
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

    public function ipsDestroy($data)
    {
        $response = $this->client->request("delete",$this->domain."/object/ip_address/ipv4_address", [
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json;charset=UTF-8',
                "Authorization" => $this->token,
            ],

            "json" => [
                $data
            ]

            /*{
                "name": "Test",
            }*/
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }


    public function natsIndex()
    {
        $response = $this->client->request("get",$this->domain."/policy/nat/policy_based", [
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json;charset=UTF-8',
                "Authorization" => $this->token,
            ],

            "json" => [

            ]
        ]);

        $this->logout();

        return json_decode($response->getBody()->getContents(), true)["result"];
    }

    public function natsStore($data)
    {
        $response = $this->client->request("post",$this->domain."/policy/nat/policy_based", [
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json;charset=UTF-8',
                "Authorization" => $this->token,
            ],

            "json" => [
                $data
            ]

            /*{
      "index": "23",
            "enable": "0",
            "before_source_ip4_object": "all",
            "before_destination_ip4_object": "WAN",
            "before_service_object": "ssh_2022",
            "after_source_ip4_object": "",
            "after_destination_ip4_object": "FW_2",
            "after_sevice_object": "SSH",
            "rule_number": "1",
            "description": "",
            "reverse": "0",
            "nat_id": "1",
            "before_source_ip4_address": "0.0.0.0/0",
            "before_destination_ip4_address": "192.168.155.180/32",
            "after_source_ip4_address": "0.0.0.0/0",
            "after_destination_ip4_address": "10.0.1.2/32",
            "dynamic_blacklist_enable": "0",
            "source_port_reuse_enable": "0",
            "apply_flag": "0"
}*/
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

    public function natsDestroy($data)
    {
        $response = $this->client->request("delete",$this->domain."/policy/nat/policy_based", [
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json;charset=UTF-8',
                "Authorization" => $this->token,
            ],

            "json" => [
                $data
            ]

            /*{
                "index": 23
            }*/
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }
}
