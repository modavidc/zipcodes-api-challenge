
<?php

namespace Tests\Feature\Controllers\ZipCodes;

use Tests\TestCase;

// Core
use Tests\Mocks\ZipCodeMock;

class GetZipCodeControllerTest extends TestCase
{
    /** @test */
    public function should_get_an_existing_zip_code()
    {
        $zipCodeNumber = ZipCodeMock::create();

        $response = $this->get("/api/zip-codes/search");

        $response->assertStatus(200);
    }
}
