<?php

namespace Tests\Unit\Services;

use Tests\TestCase;

// Core
use App\Services\ZipCodes\Importer;
use Tests\Mocks\ZipCodesFileMock;

class ImporterTest extends TestCase
{
    /** @test */
    public function should_import_zip_codes_from_a_txt_from_importer()
    {
        $file = ZipCodesFileMock::create();

        $importerInstance = new Importer();
        $result = $importerInstance->import($file);

        $this->assertEquals($result, null);
    }
}
