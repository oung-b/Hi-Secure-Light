<?php

namespace App\Http\Controllers;

use App\Exports\SoftwareExport;
use App\Http\Requests\SoftwareRequest;
use App\Imports\SoftwareImport;
use App\Models\Category;
use App\Models\IdentifyLog;
use App\Models\Software;
use App\Models\System;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class SoftwareController extends Controller
{
    public function index()
    {
        $softwares = Software::with('system.category')->orderBy('system_id')->get()->groupBy('system.name');
        $identifyLog = IdentifyLog::whereType('software')->latest()->first();
        return view('user.information.identify.identify_software')->with('softwares', $softwares)->with('identifyLog', $identifyLog);
    }

    public function create()
    {
        $categories = Category::get();
        return view('user.information.identify.identify_software_add')->with('categories', $categories);
    }

    public function store(SoftwareRequest $request)
    {
        $software = Software::create($request->validated());
        $this->createIdentifyLog($software->id);
        return redirect()->route('software.index');
    }

    public function edit(Software $software)
    {
        $categories = Category::get();
        $systems = System::whereCategoryId($software->system->category_id)->get();
        return view('user.information.identify.identify_software_edit')->with('software', $software)
            ->with('categories', $categories)->with('systems', $systems);
    }

    public function update(SoftwareRequest $request, Software $software)
    {
        $software->update($request->validated());
        $this->createIdentifyLog($software->id);
        return redirect()->route('software.index');
    }

    public function destroy(Request $request)
    {
        $idArr = $request->input('id');
        Software::destroy($idArr);
        foreach ($idArr as $id) {
            $this->createIdentifyLog($id);
        }
        return redirect()->route('software.index');
    }

    public function systems(Request $request)
    {
        $systems = System::whereCategoryId($request->input('category_id'))->get();
        return response($systems);
    }

    public function export()
    {
        return Excel::download(new SoftwareExport(), 'software.xlsx');
    }

    public function import(Request $request)
    {
        Software::truncate();
        Excel::import(new SoftwareImport(), $request->file('file'));

        IdentifyLog::whereType('software')->delete();
        $this->createIdentifyLog(null);

        return redirect()->route('software.index');
    }

    private function createIdentifyLog($id)
    {
        IdentifyLog::create([
            'software_id' => $id,
            'created_by' => Auth::user()->ids,
            'type' => 'software'
        ]);
    }
}
