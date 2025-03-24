<?php

namespace App\Models;

use App\Imports\SystemRemoteImport;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Maatwebsite\Excel\Facades\Excel;

class RemoteLog extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'event_id',
        'message',
        'created_at',
        'updated_at',
    ];

    public static function store()
    {
        $scriptPath = storage_path('powershell/exportRemoteLog.ps1');
        shell_exec("powershell -ExecutionPolicy Bypass -File \"$scriptPath\"");

        $csvPath = "C:\Temp\RDPLogs.csv";
        Excel::import(new SystemRemoteImport(), $csvPath);
    }
}
