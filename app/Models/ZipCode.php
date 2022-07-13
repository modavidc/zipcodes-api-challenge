<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZipCode extends Model
{
    use HasFactory;

    protected $hidden = [
        'id',
        'federal_entity_id',
        'municipality_id',
        'settlement_id',
        'created_at',
        'updated_at',
    ];

    protected $with = [
        'federal_entity',
        'settlements',
        'municipality',
    ];

    public function federal_entity()
    {
        return $this->hasOne(FederalEntity::class, 'id', 'federal_entity_id');
    }

    public function settlements()
    {
        return $this->hasMany(Settlement::class);
    }

    public function municipality()
    {
        return $this->hasOne(Municipality::class, 'id', 'municipality_id');
    }
}
