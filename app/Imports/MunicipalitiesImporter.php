<?php

namespace App\Imports;

// Core
use App\Models\Municipality;

class MunicipalitiesImporter
{
    public static function import(array $municipalities)
    {        
        foreach ($municipalities as $municipality) {
            $newMunicipality = new Municipality();

            $newMunicipality->key = intval($municipality['key']);
            $newMunicipality->name = $municipality['name'];
            $newMunicipality->federal_entity_key = $municipality['federal_entity_key'];

            $newMunicipality->save();
        }
    }
}
