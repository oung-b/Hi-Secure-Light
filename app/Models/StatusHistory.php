<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusHistory extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function device()
    {
        return $this->belongsTo(Device::class);
    }

    public static function record()
    {
        $devices = Device::get();

        foreach($devices as $device){
            $statusHistory = $device->statusHistories()
                ->where("created_at", ">=", Carbon::now()->startOfDay())
                ->where("created_at", "<=", Carbon::now()->endOfDay())
                ->first();

            if($device->status){
                $statusHistory
                    ? $statusHistory->update(["status" => $device->status])
                    :   StatusHistory::create([
                        "device_id" => $device->id,
                        "status" => $device->status
                        ]);
            }
        }
    }

}
