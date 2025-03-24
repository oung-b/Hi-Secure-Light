<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class System extends Model
{
    use SoftDeletes;

    protected $fillable = [
//        'category_id',
        'name',
        'supplier',
        'model',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function hardwares(): HasMany
    {
        return $this->hasMany(Hardware::class);
    }

    public function softwares(): HasMany
    {
        return $this->hasMany(Software::class);
    }
}
