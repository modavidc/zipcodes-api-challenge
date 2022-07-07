<?php

namespace App\Imports;

// Core
use App\Models\FederalEntity;

class FederalEntitiesImporter
{
    public static function import(array $federalEntities)
    {
        foreach ($federalEntities as $federalEntity) {
            $newFederalEntity = new FederalEntity();

            $newFederalEntity->key_id = intval($federalEntity['key']);
            $newFederalEntity->name = $federalEntity['name'];

            $newFederalEntity->save();
        }
    }
}
