<?php

namespace Tests\Mocks;

// Core 
use App\Models\FederalEntity;
use App\Models\Municipality;

class ZipCodesMock
{
    public static function array(): array
    {
        $municipality = Municipality::factory()->create();
        $federalEntity = FederalEntity::find($municipality->federal_entity_id);

        return  [
            [
                'zip_code' => '10000',
                'locality' => 'Locality 1',
                'federal_entity_key' => $federalEntity->key,
                'federal_entity_id' => $federalEntity->id,
                'municipality_key' => $municipality->key,
                'municipality_id' => $municipality->id
            ],
            [
                'zip_code' => '20000',
                'locality' => 'Locality 2',
                'federal_entity_key' => $federalEntity->key,
                'federal_entity_id' => $federalEntity->id,
                'municipality_key' => $municipality->key,
                'municipality_id' => $municipality->id
            ],
        ];
    }

    public static function arrayIncomplete(): array
    {
        return  [
            [
                'zip_code' => '10000',
                'locality' => 'Locality 1',
            ],
            [
                'zip_code' => '20000',
                'locality' => 'Locality 2',
            ],
        ];
    }
}
