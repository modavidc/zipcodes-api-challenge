<?php

namespace App\Imports\Contracts;

interface ImportableInterface
{
    public static function save(array $array);
}
