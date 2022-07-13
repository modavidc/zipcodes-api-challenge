<?php

namespace Tests\Feature\Controllers\ZipCodes;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;

// Core
use Tests\Mocks\ZipCodesFileMock;

class ImportFromTxtControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function should_import_zip_codes_from_a_txt()
    {
        $file = ZipCodesFileMock::create();

        $response = $this->post("/api/zip-codes/import/txt", [
            'file' => $file
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'status' => true,
                'code' => 200,
                'message' => "Importación exitosa."
            ]);
    }

    /** @test */
    public function should_throw_an_exception_when_the_file_is_not_sent()
    {
        $response = $this->post("/api/zip-codes/import/txt");

        $response->assertStatus(422)
            ->assertJson([
                'status' => false,
                'code' => 422,
                'message' => "Entidad no procesable."
            ]);
    }

    /** @test */
    public function should_throw_an_exception_when_the_file_is_not_txt()
    {
        $image = ZipCodesFileMock::image();

        $response = $this->post("/api/zip-codes/import/txt", [
            'file' => $image
        ]);

        $response->assertStatus(422)
            ->assertJson([
                'status' => false,
                'code' => 422,
                'message' => "Entidad no procesable."
            ]);
    }
}
