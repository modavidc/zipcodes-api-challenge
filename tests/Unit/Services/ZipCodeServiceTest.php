<?php

namespace Tests\Unit\Services;

use Tests\TestCase;

// Core
use App\Cache\ZipCodeCache;
use App\Services\ZipCodes\ZipCodeService;
use App\Services\ZipCodes\Importer;
use App\Repositories\ZipCodes\ZipCodeRepository;
use App\Models\ZipCode;
use Tests\Mocks\ZipCodeMock;
use Tests\Mocks\ZipCodesFileMock;

class ZipCodeServiceTest extends TestCase
{
    /** @test */
    public function should_get_an_existing_zip_code_from_service()
    {
        $zipCodeNumber = ZipCodeMock::create();

        $zipCodeRepositoryInstance = new ZipCodeRepository(new ZipCode());
        $zipCodeService = new ZipCodeService(new ZipCodeCache($zipCodeRepositoryInstance), new Importer());

        $zipCode = $zipCodeService->getZipCode($zipCodeNumber);

        $this->assertEquals($zipCode->zip_code, $zipCodeNumber);
    }

    /** @test */
    public function should_import_zip_codes_from_a_txt_from_service()
    {
        $file = ZipCodesFileMock::create();

        $zipCodeRepositoryInstance = new ZipCodeRepository(new ZipCode());
        $zipCodeService = new ZipCodeService(new ZipCodeCache($zipCodeRepositoryInstance), new Importer());

        $result = $zipCodeService->importFromTxt($file);

        $this->assertEquals($result, null);
    }
}
