<?php

namespace App\Http\Controllers;

class CBSController extends Controller
{
    public function add()
    {
        return view('user.cbs.CBS_account_add');
    }

    public function delete()
    {
        return view('user.cbs.CBS_account_del');
    }

    public function modify()
    {
        return view('user.cbs.CBS_account_modify');
    }
}
