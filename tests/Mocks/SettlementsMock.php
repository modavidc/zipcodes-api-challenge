<?php

namespace Tests\Mocks;

// Core 
use App\Models\SettlementType;
use App\Models\ZipCode;

class SettlementsMock
{
    public static function array(): array
    {
        $settlementType = SettlementType::factory()->create();
        $zipCode = ZipCode::factory()->create();

        return  [
            [
                'key' => 1,
                'name' => 'Settlement 1',
                'zone_type' => 'Zone 1',
                'settlement_type_id' => $settlementType->id,
                'settlement_type' => $settlementType->name,
                'zip_code_id' => $zipCode->id,
                'zip_code' => $zipCode->zip_code,
            ],
            [
                'key' => 2,
                'name' => 'Settlement 2',
                'zone_type' => 'Zone 2',
                'settlement_type_id' => $settlementType->id,
                'settlement_type' => $settlementType->name,
                'zip_code_id' => $zipCode->id,
                'zip_code' => $zipCode->zip_code,
            ],
        ];
    }

    public static function arrayIncomplete(): array
    {
        return  [
            [
                'zip_code' => '10000',
                'locality' => 'Locality 1',
            ],
            [
                'zip_code' => '20000',
                'locality' => 'Locality 2',
            ],
        ];
    }
}
