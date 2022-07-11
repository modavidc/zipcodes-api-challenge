<?php

namespace App\Repositories\ZipCodes;

// Core
use App\Repositories\ZipCodes\Contracts\ZipCodeRepositoryInterface;
use App\Models\ZipCode;

class ZipCodeRepository implements ZipCodeRepositoryInterface
{
    protected $model;

    public function __construct(ZipCode $model)
    {
        $this->model = $model;
    }

    public function getZipCode(String $zipCodeNumber): ZipCode
    {
        $zipCode = ZipCode::query()
            ->where('zip_code', $zipCodeNumber)
            ->first();

        if (empty($zipCode)) {
            throw new \Exception("El zip code no se encuentra en la base de datos", 404);
        }

        return $zipCode;
    }
}
