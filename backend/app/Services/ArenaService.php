<?php

namespace App\Services;

use App\Models\Arena;
use Illuminate\Support\Str;

class ArenaService
{
    public function create(array $data, int $ownerId): Arena
    {
        $data['owner_id'] = $ownerId;

        $data['slug'] = Str::slug($data['name']) . '-' . time();

        return Arena::create($data);
    }
}