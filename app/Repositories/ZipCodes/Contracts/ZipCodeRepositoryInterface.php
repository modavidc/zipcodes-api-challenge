<?php

namespace App\Repositories\ZipCodes\Contracts;

// Core
use App\Models\ZipCode;

interface ZipCodeRepositoryInterface
{
    public function getZipCode(String $zipCodeNumber): ?ZipCode;
}
