<?php

namespace App\Utils;

class ConstantsUtil
{
    // HTTP Status
    const SUCCESS = true;
    const FAIL = false;

    // HTTP Codes
    const OK = 200;
    const UNPROCESSABLE_ENTITY = 422;
    const NOT_FOUND = 404;
    const TO_MANY_REQUESTS = 429;

    const SERVER_ERROR = 500;
}
