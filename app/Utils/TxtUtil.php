<?php

namespace App\Utils;

// Core
use App\Utils\ConstantsUtil;

class TxtUtil
{
    public static function invalidTextLine(int $key, String $line): Bool
    {
        return in_array($key, ConstantsUtil::HEADER_LINES) || $line === "";
    }

    public static function transformToArray(String $line): array
    {
        $explodedLine = explode('|', utf8_encode($line));
        $replacedLine = preg_replace("/\r|\n/", "", $explodedLine);

        return $replacedLine;
    }
}
