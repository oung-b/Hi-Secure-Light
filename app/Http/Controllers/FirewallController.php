<?php

namespace App\Http\Controllers;

use App\Http\Requests\PolicyPatchRequest;
use App\Http\Requests\PolicyRequest;
use App\Models\FirewallApi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FirewallController extends Controller
{
    private $urls = ['', 'https://10.0.1.254:50015', 'https://10.0.1.2:50015', 'https://10.0.1.3:50015', 'https://10.0.1.4:50015', 'https://10.0.1.5:50015', 'https://10.0.1.6:50015'];

    public function policy(Request $request)
    {
        $firewallApi = new FirewallApi([], $this->getUrl($request->segments()));
        $items = $firewallApi->policyIndex();

        return view('user.quick-function.policy.policy_control')->with('items', $items);
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
        $policy = $firewallApi->policyShow(['rule_id' => $request->segment(4)]);

        return view('user.quick-function.policy.policy_control_modify')->with('policy', $policy);
    }

    public function policyUpdate(PolicyPatchRequest $request)
    {
        $firewallApi = new FirewallApi([], $this->getUrl($request->segments()));
        $policy = $firewallApi->policyShow(['rule_id' => $request->segment(4)]);

        $validated = array_merge($policy, $request->validated());

        $firewallApi = new FirewallApi([], $this->getUrl($request->segments()));
        $firewallApi->policyUpdate($validated);

        return redirect()->route('firewall.policy', $request->segment(3));
    }

    public function policyEnable(Request $request)
    {
        $firewallApi = new FirewallApi([], $this->getUrl($request->segments()));
        $policy = $firewallApi->policyShow(['rule_id' => $request->segment(4)]);
        $policy['enable'] = ($policy['enable'] == 1) ? 0 : 1;

        $firewallApi = new FirewallApi([], $this->getUrl($request->segments()));
        $firewallApi->policyUpdate($policy);

        return redirect()->route('firewall.policy', $request->segment(3));
    }

    public function policyDestroy(Request $request)
    {
        $firewallApi = new FirewallApi([], $this->getUrl($request->segments()));
        $firewallApi->policyDestroy(['index' => $request->segment(4), 'rule_id' => $request->segment(5)]);

        return redirect()->route('firewall.policy', $request->segment(3));
    }

    public function interface(Request $request)
    {
        $firewallApi = new FirewallApi([], $this->getUrl($request->segments()));
        $items = $firewallApi->interfaceIndex();

        $enables = array_column(array_filter($items, function($item) {
            return $item['interface_up_down_enable'] == 1;
        }), 'name');

        return view('user.quick-function.interface.interface_control')->with('items', $items)->with('enables', $enables);
    }

    public function interfaceEnable(Request $request)
    {
        $firewallApi = new FirewallApi([], $this->getUrl($request->segments()));
        $interface = $firewallApi->interfaceShow(['name' => $request->segment(4)]);
        $interface['interface_up_down_enable'] = ($interface['interface_up_down_enable'] == 1) ? 0 : 1;

        $firewallApi = new FirewallApi([], $this->getUrl($request->segments()));
        $firewallApi->interfaceUpdate($interface);

        return redirect()->route('firewall.interface', $request->segment(3));
    }

    /**
     * @param array $path
     * @return string
     */
    private function getUrl(array $path): string
    {
        return $this->urls[Str::after($path[2], 'fw')];
    }
}
