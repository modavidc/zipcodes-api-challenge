<?php

namespace App\Imports;

// Core
use App\Models\SettlementType;

class SettlementsTypesImporter
{
    public static function import(array $settlementsTypes)
    {
        foreach ($settlementsTypes as $settlementType) {
            $newSettlementType = new SettlementType();

            $newSettlementType->name = $settlementType;

            $newSettlementType->save();
        }
    }
}
