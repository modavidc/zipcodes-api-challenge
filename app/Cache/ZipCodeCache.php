<?php

namespace App\Cache;

use App\Repositories\ZipCodes\Contracts\ZipCodeRepositoryInterface;
use App\Repositories\ZipCodes\ZipCodeRepository;

class ZipCodeCache extends BaseCache implements ZipCodeRepositoryInterface
{
    public function __construct(ZipCodeRepository $repository) {
        parent::__construct($repository, 'zip_code');
    }

    public function getZipCode(String $zipCodeNumber)
    {        
        return $this->cache::remember("$this->key.$zipCodeNumber", self::TTL, function() use ($zipCodeNumber) {
            dump("cacheando ");

            return $this->repository->getZipCode($zipCodeNumber);
        });
    }
}
