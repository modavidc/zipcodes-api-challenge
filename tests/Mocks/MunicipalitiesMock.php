<?php

namespace Tests\Mocks;

// Core 
use App\Models\FederalEntity;

class MunicipalitiesMock
{
    public static function array(): array
    {
        $federalEntity = FederalEntity::factory()->create();

        return  [
            [
                'name' => 'Municipality 1',
                'key' => 1,
                'federal_entity_key' => $federalEntity->key,
                'federal_entity_id' => $federalEntity->id                
                
            ],
            [
                'name' => 'Municipality 2',
                'key' => 2,
                'federal_entity_key' => $federalEntity->key,
                'federal_entity_id' => $federalEntity->id                
            ],
        ];
    }

    public static function arrayIncomplete(): array
    {
        return  [
            ['name' => 'Municipality 1'],
            ['name' => 'Municipality 2']
        ];
    }
}
