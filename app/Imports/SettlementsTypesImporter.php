<?php

namespace App\Imports;

// Core
use App\Imports\Contracts\ImportableInterface;
use App\Models\SettlementType;

class SettlementsTypesImporter implements ImportableInterface
{
    public static function save(array $settlementsTypes)
    {
        foreach ($settlementsTypes as $settlementType) {
            $newSettlementType = new SettlementType();

            $newSettlementType->name = $settlementType;

            $newSettlementType->save();
        }
    }
}
