<?php

namespace App\Http\Controllers;

use App\Http\Requests\PolicyPatchRequest;
use App\Http\Requests\PolicyRequest;
use App\Models\FirewallApi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FirewallController extends Controller
{
    // check-point 방화벽 IP들
    private $local_urls = ['https://210.91.170.99:4434/web-api', 'https://210.91.170.99:4441/web-api', 'https://210.91.170.99:4442/web-api', 'https://210.91.170.99:4443/web-api', 'https://210.91.170.99:4442/web-api'];
    private $prov_urls = ['https:/10.0.1.200:4434/web-api', 'https://10.0.1.211:4441/web-api', 'https://10.0.1.212:4442/web-api', 'https://10.0.1.213:4443/web-api', 'https://10.0.1.212:4442/web-api'];

    public function policy(Request $request)
    {
        $firewallApi = new FirewallApi([], $this->getUrl($request->segments()));
        $policies = $firewallApi->policyIndex();

        return view('user.quick-function.policy.policy_control')
            ->with('outgoingPolicies', $policies['outgoing'])
            ->with('incomingPolicies', $policies['incoming']);
    }

    public function policyCreate()
    {
        return view('user.quick-function.policy.policy_control_add');
    }

    public function policyStore(PolicyRequest $request)
    {
        $validated = $request->validated();
        $validated['index'] = 0;

        $firewallApi = new FirewallApi([], $this->getUrl($request->segments()));
        $firewallApi->policyStore($validated);

        return redirect()->route('firewall.policy', $request->segment(3));
    }

    public function policyEdit(Request $request)
    {
        $firewallApi = new FirewallApi([], $this->getUrl($request->segments()));
        $policy = $firewallApi->policyShow(['no' => $request->segment(5), 'policyType' => $request->segment(4)]);

        return view('user.quick-function.policy.policy_control_modify')->with('policy', $policy);
    }

    public function policyUpdate(PolicyPatchRequest $request)
    {
        $validated = $request->validated();

        $firewallApi = new FirewallApi([], $this->getUrl($request->segments()));
        $firewallApi->policyUpdate($validated);

        return redirect()->route('firewall.policy', $request->segment(3));
    }

    public function policyEnable(Request $request)
    {
        $data = [
            'policyType' => $request->segment(4),
            'no' => $request->segment(5),
            'status' => $request->segment(6),
        ];

        $firewallApi = new FirewallApi([], $this->getUrl($request->segments()));
        $firewallApi->policyEnableDisable($data);

        return redirect()->route('firewall.policy', $request->segment(3));
    }

    public function policyDestroy(Request $request)
    {
        $firewallApi = new FirewallApi([], $this->getUrl($request->segments()));
        $firewallApi->policyDestroy(['policyType' => $request->segment(4), 'no' => $request->segment(5)]);

        return redirect()->route('firewall.policy', $request->segment(3));
    }

    public function interface(Request $request)
    {
        $firewallApi = new FirewallApi([], $this->getUrl($request->segments()));
        $interfaces = $firewallApi->interfaceIndex();

        return view('user.quick-function.interface.interface_control')->with('interfaces', $interfaces);
    }

    public function interfaceEnable(Request $request)
    {
        $firewallApi = new FirewallApi([], $this->getUrl($request->segments()));
        $firewallApi->interfaceUpdate([
            'name' => $request->segment(4),
            'status' => $request->segment(5),
        ]);

        return redirect()->route('firewall.interface', $request->segment(3));
    }

    /**
     * @param array $path
     * @return string
     */
    private function getUrl(array $path): string
    {
        $fwIndex = Str::after($path[2], 'fw');

        if (config('app.env') === 'local') {
            return $this->local_urls[$fwIndex-1];
        }
        return $this->prov_urls[$fwIndex-1];
    }
}
