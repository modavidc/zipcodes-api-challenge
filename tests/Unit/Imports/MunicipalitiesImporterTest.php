<?php

namespace Tests\Unit\Imports;

use Tests\TestCase;
use ErrorException;

// Core
use App\Imports\MunicipalitiesImporter;
use Tests\Mocks\MunicipalitiesMock;

class MunicipalitiesImporterTest extends TestCase
{
    /** @test */
    public function should_save_in_the_database_data_an_municipalities_array()
    {
        $municipalitiesMock = MunicipalitiesMock::array();
                
        $importer = new MunicipalitiesImporter();
        $importer::save($municipalitiesMock);

        $this->assertDatabaseHas('municipalities', [
            'key_id' => $municipalitiesMock[0]['key'],
            'name' => $municipalitiesMock[0]['name'],
            'federal_entity_id' => $municipalitiesMock[0]['federal_entity_id'],
        ]);
        $this->assertDatabaseHas('municipalities', [
            'key_id' => $municipalitiesMock[1]['key'],
            'name' => $municipalitiesMock[1]['name'],
            'federal_entity_id' => $municipalitiesMock[1]['federal_entity_id'],
        ]);
    }

    /** @test */
    public function should_throw_an_exception_if_any_field_is_missing_from_the_municipalities_array()
    {
        $this->expectException(ErrorException::class);

        $municipalitiesMock = MunicipalitiesMock::arrayIncomplete();

        $importer = new MunicipalitiesImporter();
        $importer::save($municipalitiesMock);
    }
}
