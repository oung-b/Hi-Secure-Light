<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SecureAlarm extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'found_started_at',
        'found_finished_at',
        'pivot',
        'count',
        'level',
        'sip',
        'dip',
    ];
}
