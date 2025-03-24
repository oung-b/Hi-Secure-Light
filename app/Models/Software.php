<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Software extends Model
{
    use SoftDeletes;

    protected $table = 'softwares';

    protected $fillable = [
        'system_id',
        'name',
        'firmware',
        'application',
        'patch_level',
        'purpose',
    ];

    public function system(): BelongsTo
    {
        return $this->belongsTo(System::class);
    }
}
