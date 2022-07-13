<?php

namespace App\Utils;

class ConstantsUtil
{
    // HTTP Status
    const SUCCESS = true;
    const FAIL = false;

    // HTTP Codes
    const OK = 200;
    const NOT_FOUND = 404;
    const UNPROCESSABLE_ENTITY = 422;
    const TO_MANY_REQUESTS = 429;
    const SERVER_ERROR = 500;

    // HTTP Messages
    const NOT_FOUND_MESSAGE = "Código postal no encontrado.";
    const UNPROCESSABLE_ENTITY_MESSAGE = "Código postal no encontrado.";
}
