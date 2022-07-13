<?php

namespace App\Traits;

trait KeyAttributeTrait
{
    public function getKeyAttribute()
    {
        return $this->key_id;
    }
}