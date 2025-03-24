<?php

namespace App\Http\Controllers;

class InformationController extends Controller
{
    public function safeGuard()
    {
        return view('user.information.protect.protect_safeguard');
    }

    public function securityZone()
    {
        return view('user.information.protect.protect_security_zone');
    }

    public function accessControl()
    {
        return view('user.information.protect.protect_access_control');
    }

    public function wireless()
    {
        return view('user.information.protect.protect_wireleess');
    }

    public function mobilePortable()
    {
        return view('user.information.protect.protect_mobile_portable');
    }

    public function incident()
    {
        return view('user.information.response.response_plan');
    }

    public function manual()
    {
        return view('user.information.response.response_manual');
    }

    public function network()
    {
        return view('user.information.response.response_network');
    }

    public function minimal()
    {
        return view('user.information.response.response_risk');
    }

    public function recovery()
    {
        return view('user.information.recover.recover_plan');
    }

    public function backup()
    {
        return view('user.information.recover.recover_backup');
    }

    public function shutdown()
    {
        return view('user.information.recover.recover_shutdown');
    }
}
