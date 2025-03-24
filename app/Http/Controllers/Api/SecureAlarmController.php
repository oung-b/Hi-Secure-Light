<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SecureAlarmRequest;
use App\Models\SecureAlarm;

class SecureAlarmController extends ApiController
{
//    public function index()
//    {
//        return SecureAlarm::all();
//    }

    public function store(SecureAlarmRequest $request)
    {
        $result = SecureAlarm::create($request->validated());
        return $this->respondSuccessfully($result);
    }

//    public function show(SecureAlarm $secureAlarm)
//    {
//        return $secureAlarm;
//    }
//
//    public function update(SecureAlarmRequest $request, SecureAlarm $secureAlarm)
//    {
//        $secureAlarm->update($request->validated());
//
//        return $secureAlarm;
//    }
//
//    public function destroy(SecureAlarm $secureAlarm)
//    {
//        $secureAlarm->delete();
//
//        return response()->json();
//    }
}
