<?php

namespace Tests\Unit\Imports;

use Tests\TestCase;
use ErrorException;

// Core
use App\Imports\FederalEntitiesImporter;
use Tests\Mocks\FederalEntitiesMock;

class FederalEntitiesImporterTest extends TestCase
{
    /** @test */
    public function should_save_in_the_database_data_an_federal_entities_array()
    {
        $federalEntitiesMock = FederalEntitiesMock::array();
        
        $importer = new FederalEntitiesImporter();
        $importer::save($federalEntitiesMock);

        $this->assertDatabaseHas('federal_entities', [
            'key_id' => $federalEntitiesMock[0]['key'],
            'name' => $federalEntitiesMock[0]['name'],
        ]);
        $this->assertDatabaseHas('federal_entities', [
            'key_id' => $federalEntitiesMock[1]['key'],
            'name' => $federalEntitiesMock[1]['name'],
        ]);
    }

    /** @test */
    public function should_throw_an_exception_if_any_field_is_missing_from_the_federal_entities_array()
    {
        $this->expectException(ErrorException::class);

        $federalEntitiesMock = FederalEntitiesMock::arrayIncomplete();

        $importer = new FederalEntitiesImporter();
        $importer::save($federalEntitiesMock);
    }
}
