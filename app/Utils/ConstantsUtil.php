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
    const METHOD_NOT_ALLOWED = 405;
    const UNPROCESSABLE_ENTITY = 422;
    const SERVER_ERROR = 500;

    // HTTP Messages
    const NOT_FOUND_MESSAGE = "El recurso al que hace referencia no existe.";
    const METHOD_NOT_ALLOWED_MESSAGE = "Método no permitido.";
    const UNPROCESSABLE_ENTITY_MESSAGE = "Entidad no procesable.";

    const HEADER_LINES = [0, 1];
}
