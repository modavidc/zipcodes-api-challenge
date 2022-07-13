<?php

namespace App\Repositories\ZipCodes;

// Core
use App\Repositories\BaseRepository;
use App\Repositories\ZipCodes\Contracts\ZipCodeRepositoryInterface;
use App\Models\ZipCode;

class ZipCodeRepository extends BaseRepository implements ZipCodeRepositoryInterface
{
    protected $model;

    public function __construct(ZipCode $model)
    {
        $this->model = $model;
    }

    public function getZipCode(String $zipCodeNumber)
    {
        return ZipCode::query()
            ->whereZipCode($zipCodeNumber)
            ->firstOrFail();
    }
}
