<?php

namespace App\Imports;

// Core
use App\Models\ZipCode;

class ZipCodesImporter
{
    public  static function import(array $zipCodes)
    {
        foreach ($zipCodes as $zipCode) {
            $newZipCode = new ZipCode();

            $newZipCode->zip_code = $zipCode['zip_code'];
            $newZipCode->locality = $zipCode['locality'];
            $newZipCode->federal_entity_key = $zipCode['federal_entity_key'];
            $newZipCode->municipality_key = $zipCode['municipality_key'];

            $newZipCode->save();
        }
    }
}
