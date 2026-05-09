<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Arena extends Model
{
    protected $fillable = [
        'owner_id',
        'name',
        'slug',
        'description',
        'city',
        'address',
        'price_per_hour',
        'open_hour',
        'close_hour',
        'is_active',
    ];

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
}