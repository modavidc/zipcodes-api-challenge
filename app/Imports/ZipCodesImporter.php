<?php

namespace App\Imports;

// Core
use App\Models\Municipality;
use App\Models\ZipCode;

class ZipCodesImporter
{
    public  static function import(array $zipCodes)
    {
        foreach ($zipCodes as $zipCode) {
            $municipality = Municipality::query()
                ->where('key_id', $zipCode['municipality_key'])
                ->whereIn('federal_entity_id', function ($q) use ($zipCode) {
                    $q->select('id')
                        ->from('federal_entities')
                        ->where('key_id', $zipCode['federal_entity_key']);
                })
                ->first();

            $newZipCode = new ZipCode();

            $newZipCode->zip_code = $zipCode['zip_code'];
            $newZipCode->locality = $zipCode['locality'];
            $newZipCode->federal_entity_id = $municipality->federal_entity_id;
            $newZipCode->municipality_id = $municipality->id;

            $newZipCode->save();
        }
    }
}
