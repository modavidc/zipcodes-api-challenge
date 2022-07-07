<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Core
use App\Traits\KeyAttributeTrait;
 
class Settlement extends Model
{
    use HasFactory;
    use KeyAttributeTrait;

    protected $appends = [
        'key'
    ];

    protected $hidden = [
        'id',
        'key_id',
        'settlement_type_id',
        'zip_code_id',
        'created_at',
        'updated_at',
    ];

    protected $with = [
        'settlement_type',
    ];

    public function settlement_type()
    {
        return $this->hasOne(SettlementType::class, 'id', 'settlement_type_id');
    }
}
