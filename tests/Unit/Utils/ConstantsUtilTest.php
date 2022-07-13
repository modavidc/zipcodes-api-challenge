<?php

namespace Tests\Unit\Utils;

use PHPUnit\Framework\TestCase;

// Core
use App\Utils\ConstantsUtil;

class ConstantsUtilTest extends TestCase
{
    /** @test */
    public function should_get_true_when_sucess()
    {
        $this->assertTrue(ConstantsUtil::SUCCESS, true);
    }

    /** @test */
    public function should_get_false_when_fail()
    {
        $this->assertFalse(ConstantsUtil::FAIL, false);
    }

    /** @test */
    public function should_get_200_when_response_ok()
    {
        $this->assertEquals(ConstantsUtil::OK, 200);
    }

    /** @test */
    public function should_get_404_when_response_is_not_found()
    {
        $this->assertEquals(ConstantsUtil::NOT_FOUND, 404);
    }

    /** @test */
    public function should_get_405_when_response_is_not_allowed()
    {
        $this->assertEquals(ConstantsUtil::METHOD_NOT_ALLOWED, 405);
    }

    /** @test */
    public function should_get_422_when_response_is_unprocessable()
    {
        $this->assertEquals(ConstantsUtil::UNPROCESSABLE_ENTITY, 422);
    }

    /** @test */
    public function should_get_500_when_response_is_unprocessable()
    {
        $this->assertEquals(ConstantsUtil::SERVER_ERROR, 500);
    }

    /** @test */
    public function should_get_resource_not_found_message_when_response_is_404()
    {
        $this->assertEquals(ConstantsUtil::NOT_FOUND_MESSAGE, "El recurso al que hace referencia no existe.");
    }

    /** @test */
    public function should_get_method_not_allowed_message_when_response_is_405()
    {
        $this->assertEquals(ConstantsUtil::METHOD_NOT_ALLOWED_MESSAGE, "Método no permitido.");
    }

    /** @test */
    public function should_get_unprocessable_message_when_response_is_422()
    {
        $this->assertEquals(ConstantsUtil::UNPROCESSABLE_ENTITY_MESSAGE, "Entidad no procesable.");
    }
}
