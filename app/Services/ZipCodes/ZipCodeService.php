<?php

namespace App\Services\ZipCodes;

use Illuminate\Http\UploadedFile;

// Core
use App\Cache\ZipCodeCache;
use App\Services\ZipCodes\Contracts\ZipCodeServiceInterface;
use App\Services\ZipCodes\Importer; 

class ZipCodeService implements ZipCodeServiceInterface
{
    protected $importer;
    protected $repository;

    public function __construct(ZipCodeCache $repository, Importer $importer)
    {
        $this->importer = $importer;        
        $this->repository = $repository;
    }

    public function importFromTxt(UploadedFile $file)
    {        
        return $this->importer->import($file);
    }
    
    public function getZipCode(String $zipCodeNumber)
    {
        $startTime = microtime(true);

        $zipCode = $this->repository->getZipCode($zipCodeNumber);

        $endTime = microtime(true);

        dump($startTime-$endTime);

        return $zipCode;
    }
}
