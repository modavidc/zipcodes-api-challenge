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
        'federal_entity_',
        'settlements_',
        'municipality_',
    ];

    public function federal_entity_()
    {
        return $this->hasOne(FederalEntity::class, 'id', 'federal_entity_id');
    }

    public function settlements_()
    {
        return $this->hasMany(Settlement::class);
    }

    public function municipality_()
    {
        return $this->hasOne(Municipality::class, 'id', 'municipality_id');
    }
}
