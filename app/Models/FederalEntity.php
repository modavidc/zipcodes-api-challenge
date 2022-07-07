<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Core
use App\Traits\KeyAttributeTrait;

class FederalEntity extends Model
{
    use HasFactory;
    use KeyAttributeTrait;

    protected $appends = [
        'key'
    ];

    protected $hidden = [
        'id',
        'key_id',
        'created_at',
        'updated_at',
    ];
}
