<?php

namespace App\Http\Controllers;

use App\Exports\HardwareExport;
use App\Http\Requests\HardwareRequest;
use App\Imports\HardwareImport;
use App\Models\Category;
use App\Models\Hardware;
use App\Models\IdentifyLog;
use App\Models\System;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class HardwareController extends Controller
{
    public function index()
    {
        $hardwares = Hardware::with('system.category')->orderBy('system_id')->get()->groupBy('system.name');
        $identifyLog = IdentifyLog::whereType('hardware')->latest()->first();
        return view('user.information.identify.identify_hardware')->with('hardwares', $hardwares)->with('identifyLog', $identifyLog);
    }

    public function create()
    {
        $categories = Category::get();
        return view('user.information.identify.identify_hardware_add')->with('categories', $categories);
    }

    public function store(HardwareRequest $request)
    {
        $hardware = Hardware::create($request->validated());
        $this->createIdentifyLog($hardware->id);
        return redirect()->route('hardware.index');
    }

    public function edit(Hardware $hardware)
    {
        $categories = Category::get();
        $systems = System::whereCategoryId($hardware->system->category_id)->get();
        return view('user.information.identify.identify_hardware_edit')->with('hardware', $hardware)
            ->with('categories', $categories)->with('systems', $systems);
    }

    public function update(HardwareRequest $request, Hardware $hardware)
    {
        $hardware->update($request->validated());
        $this->createIdentifyLog($hardware->id);
        return redirect()->route('hardware.index');
    }

    public function destroy(Request $request)
    {
        $idArr = $request->input('id');
        Hardware::destroy($idArr);
        foreach ($idArr as $id) {
            $this->createIdentifyLog($id);
        }
        return redirect()->route('hardware.index');
    }

    public function systems(Request $request)
    {
        $systems = System::whereCategoryId($request->input('category_id'))->get();
        return response($systems);
    }

    public function export()
    {
        return Excel::download(new HardwareExport(), 'hardware.xlsx');
    }

    public function import(Request $request)
    {
        Hardware::truncate();
        Excel::import(new HardwareImport(), $request->file('file'));

        IdentifyLog::whereType('hardware')->delete();
        $this->createIdentifyLog(null);

        return redirect()->route('hardware.index');
    }

    private function createIdentifyLog($id)
    {
        IdentifyLog::create([
            'hardware_id' => $id,
            'created_by' => Auth::user()->ids,
            'type' => 'hardware'
        ]);
    }
}
