<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

// Core
use App\Repositories\BaseRepositoryInterface;

class BaseRepository implements BaseRepositoryInterface
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }
}
