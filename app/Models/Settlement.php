<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
 
class Settlement extends Model
{
    use HasFactory;

    protected $hidden = [
        '_id',
        'settlement_type_key',
        'zip_code',
        'created_at',
        'updated_at',
    ];

    protected $with = [
        'settlement_type',
    ];

    public function settlement_type()
    {
        return $this->hasOne(SettlementType::class, 'name', 'settlement_type_key');
    }
}
