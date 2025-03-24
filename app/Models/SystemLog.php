<?php

namespace App\Models;

use App\Imports\SystemEventImport;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Maatwebsite\Excel\Facades\Excel;

class SystemLog extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'entry_type',
        'source',
        'event_id',
        'message',
        'created_at',
        'updated_at',
    ];

    public static function store()
    {
        $scriptPath = storage_path('powershell/exportEventLog.ps1');
        shell_exec("powershell -ExecutionPolicy Bypass -File \"$scriptPath\"");

        $csvPath = "C:\Temp\FilteredSystemEvents.csv";
        Excel::import(new SystemEventImport(), $csvPath);
    }
}
