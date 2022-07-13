<?php

namespace Tests\Mocks;

class FederalEntitiesMock
{
    public static function array(): array
    {
        return  [
            [
                'name' => 'Federal Entity 1',
                'key' => 1,
            ],
            [
                'name' => 'Federal Entity 2',
                'key' => 2,
            ],
        ];
    }

    public static function arrayIncomplete(): array
    {
        return  [
            [ 'name' => 'Federal Entity 1'],
            [ 'name' => 'Federal Entity 2']
        ];
    }
}
