<?php

namespace Tests\Unit\Cache;

use Tests\TestCase;

// Core
use App\Cache\ZipCodeCache;
use App\Repositories\ZipCodes\ZipCodeRepository;
use App\Models\ZipCode;
use Tests\Mocks\ZipCodeMock;

class ZipCodeCacheTest extends TestCase
{
    /** @test */
    public function should_get_an_existing_zip_code_from_cache()
    {
        $zipCodeNumber = ZipCodeMock::create();

        $zipCodeRepositoryInstance = new ZipCodeRepository(new ZipCode());
        $zipCodeCache = new ZipCodeCache($zipCodeRepositoryInstance);

        $zipCode = $zipCodeCache->getZipCode($zipCodeNumber);

        $this->assertEquals($zipCode->zip_code, $zipCodeNumber);
    }
}
