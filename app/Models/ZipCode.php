<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class ZipCode extends Model
{
    use HasFactory;

    protected $hidden = [
        '_id',
        'federal_entity_key',
        'municipality_key',
        'created_at',
        'updated_at',
    ];

    protected $with = [
        'federal_entity',
        'settlements',
    ];

    protected $appends = [
        'municipality',
    ];

    public function federal_entity()
    {
        return $this->hasOne(FederalEntity::class, 'key', 'federal_entity_key');
    }

    public function settlements()
    {
        return $this->hasMany(Settlement::class, 'zip_code', 'zip_code');
    }

    public function getMunicipalityAttribute()
    {
        $municipality = Municipality::query()
            ->where('key', $this->municipality_key)
            ->where('federal_entity_key', $this->federal_entity_key)
            ->first();

        return $municipality;
    }
}
