<?php

namespace App\Imports;

// Core
use App\Imports\Contracts\ImportableInterface;
use App\Models\FederalEntity;

class FederalEntitiesImporter implements ImportableInterface
{
    public static function save(array $federalEntities)
    {
        foreach ($federalEntities as $federalEntity) {
            $newFederalEntity = new FederalEntity();

            $newFederalEntity->key_id = intval($federalEntity['key']);
            $newFederalEntity->name = $federalEntity['name'];

            $newFederalEntity->save();
        }
    }
}
