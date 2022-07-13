<?php

namespace App\Utils;

class ArrayUtil
{
    public static function reordenateFederalEntity($federalEntity)
    {
        $federalEntityNewModel = array();

        $federalEntityNewModel['key'] = $federalEntity->key;
        $federalEntityNewModel['name'] = $federalEntity->name;
        $federalEntityNewModel['code'] = $federalEntity->code;

        return $federalEntityNewModel;
    }

    public static function reordenateSettlements($settlements)
    {
        $settlementsNewModels = array();

        foreach ($settlements as $settlement) {
            $newSettelemntNewModel = array();

            $newSettelemntNewModel['key'] = $settlement->key;
            $newSettelemntNewModel['name'] = $settlement->name;
            $newSettelemntNewModel['zone_type'] = $settlement->zone_type;
            $newSettelemntNewModel['settlement_type']['name'] = $settlement->settlement_type->name;

            array_push($settlementsNewModels, $newSettelemntNewModel);
        }

        return $settlementsNewModels;
    }

    public static function reordenateMunicipality($municipality)
    {
        $municipalityEntityNewModel = array();

        $municipalityEntityNewModel['key'] = $municipality->key;
        $municipalityEntityNewModel['name'] = $municipality->name;

        return $municipalityEntityNewModel;
    }
}
