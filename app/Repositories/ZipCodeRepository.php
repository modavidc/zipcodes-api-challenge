<?php

namespace App\Repositories;

use App\Contracts\ZipCodeRepositoryInterface;
use App\Models\ZipCode;

class ZipCodeRepository extends BaseRepository implements ZipCodeRepositoryInterface
{
    public function __construct(ZipCode $zipCode)
    {
        parent::__construct($zipCode);
    }

    public function getZipCode(String $zipCodeNumber)
    {
        return $this->model->where('zip_code', $zipCodeNumber)->first();
    }
}
