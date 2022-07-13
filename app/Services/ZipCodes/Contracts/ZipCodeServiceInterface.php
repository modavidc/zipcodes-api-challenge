<?php

namespace App\Services\ZipCodes\Contracts;

use Illuminate\Http\UploadedFile;

interface ZipCodeServiceInterface
{
    public function getZipCode(String $zipCodeNumber);

    public function importFromTxt(UploadedFile $file); 
}
