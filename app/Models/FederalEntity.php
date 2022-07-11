<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class FederalEntity extends Model
{
    use HasFactory;

    protected $hidden = [
        '_id',
        'created_at',
        'updated_at',
    ];
}
