<?php

namespace App\Imports;

// Core
use App\Models\Settlement;

class SettlementsImporter
{
    public static function import(array $settlements)
    {
        foreach ($settlements as $settlement) {
            $newSettlement = new Settlement();

            $newSettlement->key = $settlement['key'];
            $newSettlement->name = $settlement['name'];
            $newSettlement->zone_type = $settlement['zone'];
            $newSettlement->settlement_type_key = $settlement['settlement_type'];
            $newSettlement->zip_code = $settlement['zip_code'];

            $newSettlement->save();
        }
    }
}
