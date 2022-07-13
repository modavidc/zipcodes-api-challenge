<?php

namespace Tests\Mocks;

// Core
use App\Models\Settlement;
use App\Models\ZipCode;

class ZipCodeMock
{
    public static function create(): String
    {
        $settlement = Settlement::factory()->create();
        $zipCode = ZipCode::find($settlement->zip_code_id);

        return $zipCode->zip_code;
    }

    public static function doesNotExist(): String
    {
        $zipCodeNumberDoesNotExist = "111111";

        return $zipCodeNumberDoesNotExist;
    }
}
