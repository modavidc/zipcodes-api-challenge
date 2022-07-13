<?php

namespace Tests\Unit\Imports;

use Tests\TestCase;
use ErrorException;

// Core
use App\Imports\SettlementsTypesImporter;
use Tests\Mocks\SettlementTypeMock;

class SettlementsTypesImporterTest extends TestCase
{
    /** @test */
    public function should_save_in_the_database_data_an_settlements_types__array()
    {
        $settlementsTypesMock = SettlementTypeMock::array();
                
        $importer = new SettlementsTypesImporter();
        $importer::save($settlementsTypesMock);

        $this->assertDatabaseHas('settlement_types', [
            'name' => $settlementsTypesMock[0],
        ]);
        $this->assertDatabaseHas('settlement_types', [
            'name' => $settlementsTypesMock[1],
        ]);
    }
}
