<?php

namespace App\Imports;

// Core
use App\Imports\Contracts\ImportableInterface;
use App\Models\FederalEntity;
use App\Models\Municipality;

class MunicipalitiesImporter implements ImportableInterface
{
    public static function save(array $municipalities)
    {
        foreach ($municipalities as $municipality) {
            $federalEntity = FederalEntity::query()
                ->where('key_id', $municipality['federal_entity_key'])
                ->firstOrFail();

            $newMunicipality = new Municipality();

            $newMunicipality->key_id = intval($municipality['key']);
            $newMunicipality->name = $municipality['name'];
            $newMunicipality->federal_entity_id = $federalEntity->id;

            $newMunicipality->save();
        }
    }
}
