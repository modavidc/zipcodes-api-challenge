<?php

namespace Tests\Unit\Imports;

use Tests\TestCase;
use ErrorException;

// Core
use App\Imports\ZipCodesImporter;
use Tests\Mocks\ZipCodesMock;

class ZipCodesImporterTest extends TestCase
{
    /** @test */
    public function should_save_in_the_database_data_an_zip_codes_array()
    {
        $zipCodesMock = ZipCodesMock::array();
        
        $importer = new ZipCodesImporter();
        $importer::save($zipCodesMock);

        $this->assertDatabaseHas('zip_codes', [
            'zip_code' => $zipCodesMock[0]['zip_code'],
            'locality' => $zipCodesMock[0]['locality'],
            'federal_entity_id' => $zipCodesMock[0]['federal_entity_id'],
            'municipality_id' => $zipCodesMock[0]['municipality_id'],
        ]);
    }

    /** @test */
    public function should_throw_an_exception_if_any_field_is_missing_from_the_municipalities_array()
    {
        $this->expectException(ErrorException::class);

        $zipCodesMock = ZipCodesMock::arrayIncomplete();

        $importer = new ZipCodesImporter();
        $importer::save($zipCodesMock);
    }
}
