<?php

namespace Tests\Unit\Repositories;

use Tests\TestCase;

// Core
use App\Cache\ZipCodeCache;
use App\Services\ZipCodes\ZipCodeService;
use App\Services\ZipCodes\Importer;
use App\Repositories\ZipCodes\ZipCodeRepository;
use App\Models\ZipCode;
use Tests\Mocks\ZipCodeMock;
use Tests\Mocks\ZipCodesFileMock;

class ZipCodeRespositoryTest extends TestCase
{
    /** @test */
    public function should_get_an_existing_zip_code_from_repository()
    {
        $zipCodeNumber = ZipCodeMock::create();

        $zipCodeRepository = new ZipCodeRepository(new ZipCode());

        $zipCode = $zipCodeRepository->getZipCode($zipCodeNumber);

        $this->assertEquals($zipCode->zip_code, $zipCodeNumber);
    }

    /** @test */
    public function it_should_throw_an_exception_when_the_zip_code_not_exist_from_repository()
    {
        $zipCodeNumber = ZipCodeMock::create();
        $zipCodeNumberDoesNotExist = ZipCodeMock::doesNotExist();

        $zipCodeRepository = new ZipCodeRepository(new ZipCode());

        $zipCode = $zipCodeRepository->getZipCode($zipCodeNumber);

        $this->assertNotEquals($zipCode->zip_code, $zipCodeNumberDoesNotExist);
    }
}
