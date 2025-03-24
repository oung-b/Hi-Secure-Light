<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hardware extends Model
{
    use SoftDeletes;

    protected $table = 'hardwares';

    protected $fillable = [
        'system_id',
        'name',
        'location',
        'model',
        'q_type',
        'version',
        'rj45',
        'usb',
        'serial',
        'ip_address',
    ];

    public function system(): BelongsTo
    {
        return $this->belongsTo(System::class);
    }
}
