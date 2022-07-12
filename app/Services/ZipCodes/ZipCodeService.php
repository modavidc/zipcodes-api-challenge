<?php

namespace App\Services\ZipCodes;

use Illuminate\Http\UploadedFile;

// Core
use App\Services\ZipCodes\Contracts\ZipCodeServiceInterface;
use App\Services\ZipCodes\Importer; 
use App\Repositories\ZipCodes\Contracts\ZipCodeRepositoryInterface;

class ZipCodeService implements ZipCodeServiceInterface
{
    protected $importer;
    protected $repository;

    public function __construct(ZipCodeRepositoryInterface $repository, Importer $importer)
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
        $zipCode = $this->repository->getZipCode($zipCodeNumber);

        if (empty($zipCode)) {
            throw new \Exception("Código postal no encontrado.", 404);
        }

        return $zipCode;
    }
}
