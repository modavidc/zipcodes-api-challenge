<?php

namespace App\Utils;

// Core
use App\Utils\ConstantsUtil;
use App\Utils\ArrayUtil;

class ResponseJsonUtil
{
    public static function data(mixed $zipCode)
    {   
        $zipCode->federal_entity = ArrayUtil::reordenateFederalEntity($zipCode->federal_entity_);
        $zipCode->settlements = ArrayUtil::reordenateSettlements($zipCode->settlements_);
        $zipCode->municipality = ArrayUtil::reordenateMunicipality($zipCode->municipality_);
        
        unset($zipCode['federal_entity_']);
        unset($zipCode['settlements_']);
        unset($zipCode['municipality_']);

        return response()->json($zipCode, ConstantsUtil::OK);
    }

    public static function ok(String $message)
    {
        return response()->json([
            'status' => ConstantsUtil::SUCCESS,
            'code' => ConstantsUtil::OK,
            'message' => $message,
        ], ConstantsUtil::OK);
    }

    public static function message(bool $status, int $code, String $message)
    {
        return response()->json([
            'status' => $status,
            'code' => $code,
            'message' => $message,
        ], $code);
    }
}
