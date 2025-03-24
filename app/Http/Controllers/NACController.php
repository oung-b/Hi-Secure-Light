<?php

namespace App\Http\Controllers;

class NACController extends Controller
{
    public function node()
    {
        return view('user.main-menu.nac.nac_management_node');
    }

    public function ipAddress()
    {
        return view('user.main-menu.nac.nac_management_ip_address');
    }

    public function wlan()
    {
        return view('user.main-menu.nac.nac_management_wlan');
    }

    public function log()
    {
        return view('user.main-menu.nac.nac_log_log');
    }

    public function license()
    {
        return view('user.main-menu.nac.nac_system_license');
    }
}
