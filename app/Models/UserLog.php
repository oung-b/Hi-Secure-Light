<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserLog extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'user_ids',
        'ip_address',
        'activity',
    ];
}
