<?php

namespace App\Imports;

// Core
use App\Models\FederalEntity;
use App\Models\Municipality;

class MunicipalitiesImporter
{
    public static function import(array $municipalities)
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
