<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Municipality extends Model
{
    use HasFactory;
    
    protected $hidden = [
        '_id',
        'federal_entity_key',
        'created_at',
        'updated_at',
    ];
}
