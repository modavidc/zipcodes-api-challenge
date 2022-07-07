<?php

namespace App\Imports;

// Core
use App\Models\ZipCode;
use App\Models\SettlementType;
use App\Models\Settlement;

class SettlementsImporter
{
    public static function import(array $settlements)
    {
        foreach ($settlements as $settlement) {
            $zipCode = ZipCode::query()
                ->where('zip_code', $settlement['zip_code'])
                ->first();
            $settlementType = SettlementType::query()
                ->whereName($settlement['settlements_type'])
                ->firstOrFail();
            
            $newSettlement = new Settlement();

            $newSettlement->key_id = $settlement['key'];
            $newSettlement->name = $settlement['name'];
            $newSettlement->zone_type = $settlement['zone'];
            $newSettlement->settlement_type_id = $settlementType->id;
            $newSettlement->zip_code_id = $zipCode->id;

            $newSettlement->save();
        }
    }
}
