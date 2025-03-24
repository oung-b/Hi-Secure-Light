<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class IdentifyLog extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'hardware_id',
        'software_id',
        'created_by',
        'type',
    ];

    public function hardware(): BelongsTo
    {
        return $this->belongsTo(Hardware::class);
    }

    public function software(): BelongsTo
    {
        return $this->belongsTo(Software::class);
    }
}
