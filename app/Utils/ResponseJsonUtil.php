<?php

namespace App\Utils;

class ResponseJsonUtil
{
    public static function data(mixed $zipCode)
    {
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
