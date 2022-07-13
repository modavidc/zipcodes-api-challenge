<?php

namespace App\Repositories\ZipCodes\Contracts;

// Core
use App\Repositories\BaseRepositoryInterface;
use App\Models\ZipCode;

interface ZipCodeRepositoryInterface extends BaseRepositoryInterface
{
    public function getZipCode(String $zipCodeNumber);
}
