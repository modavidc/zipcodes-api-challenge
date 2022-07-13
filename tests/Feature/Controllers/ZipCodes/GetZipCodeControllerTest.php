<?php

namespace Tests\Feature\Controllers\ZipCodes;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

// Core
use Tests\Mocks\ZipCodeMock;

class GetZipCodeControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function should_get_an_existing_zip_code()
    {
        $zipCodeNumber = ZipCodeMock::create();

        $response = $this->get("/api/zip-codes/{$zipCodeNumber}");

        $response->assertStatus(200)
            ->assertJsonStructure([
                'zip_code',
                'locality',
                'federal_entity' => [
                    'key',
                    'name',
                    'code'
                ],
                'settlements' => [
                    '*' => [
                        'key',
                        'name',
                        'zone_type',
                        'settlement_type' => [
                            'name'
                        ]
                    ]
                ],
                'municipality' => [
                    'key',
                    'name',
                ],
            ]);
    }

    /** @test */
    public function it_should_throw_an_exception_when_the_zip_code_not_exist()
    {
        $zipCodeNumber = ZipCodeMock::doesNotExist();

        $response = $this->get("/api/zip-codes/{$zipCodeNumber}");
        
        $response->assertStatus(404)
            ->assertJson([
                'status' => false,
                'code' => 404,
                'message' => "El recurso al que hace referencia no existe."
            ]);
    }
}
