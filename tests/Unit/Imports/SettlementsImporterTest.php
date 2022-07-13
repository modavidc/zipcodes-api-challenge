<?php

namespace Tests\Unit\Imports;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use ErrorException;

// Core
use App\Imports\SettlementsImporter;
use Tests\Mocks\SettlementsMock;

class SettlementsImporterTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function should_save_in_the_database_data_an_settlements_array()
    {
        $settlementsMock = SettlementsMock::array();
        
        $importer = new SettlementsImporter();
        $importer::save($settlementsMock);

        $this->assertDatabaseHas('settlements', [
            'key_id' => $settlementsMock[0]['key'],
            'name' => $settlementsMock[0]['name'],
            'zone_type' => $settlementsMock[0]['zone_type'],
            'settlement_type_id' => $settlementsMock[0]['settlement_type_id'],
            'zip_code_id' => $settlementsMock[0]['zip_code_id'],
        ]);
    }

    /** @test */
    public function should_throw_an_exception_if_any_field_is_missing_from_the_municipalities_array()
    {
        $this->expectException(ErrorException::class);

        $settlementsMock = SettlementsMock::arrayIncomplete();

        $importer = new SettlementsImporter();
        $importer::save($settlementsMock);
    }
}
