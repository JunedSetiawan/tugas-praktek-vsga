<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use ElipZis\Cacheable\Models\Traits\Cacheable;

class Post extends Model
{
    use HasFactory,HasUuids, Cacheable;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
