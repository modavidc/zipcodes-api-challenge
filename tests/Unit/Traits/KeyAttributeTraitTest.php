<?php

namespace Tests\Unit\Traits;

use PHPUnit\Framework\TestCase;

// Core
use App\Traits\KeyAttributeTrait;

class KeyAttributeTraitTest extends TestCase
{
    /** @test */
    public function should_get_key_attribute_when_is_used()
    {
        $modelKeyable = new class
        {
            protected $key_id = "1"; 

            use KeyAttributeTrait;
        };

        $this->assertEquals($modelKeyable->getKeyAttribute(), 1);
    }
}
