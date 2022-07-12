<?php

namespace App\Contracts;

interface ZipCodeRepositoryInterface
{
    public function getZipCode(String $zipCodeNumber);
}
