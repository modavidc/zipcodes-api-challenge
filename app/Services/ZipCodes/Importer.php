<?php

namespace App\Services\ZipCodes;

use Illuminate\Http\UploadedFile;

// Core
use App\Utils\TxtUtil;
use App\Imports\FederalEntitiesImporter;
use App\Imports\MunicipalitiesImporter;
use App\Imports\ZipCodesImporter;
use App\Imports\SettlementsTypesImporter;
use App\Imports\SettlementsImporter;

class Importer
{
    public function import(UploadedFile $file)
    {
        ini_set('max_execution_time', '1500'); // 25 minutes

        $txt = $file->getContent();

        foreach (explode("\n", $txt) as $key => $line) {
            if (TxtUtil::invalidTextLine($key, $line)) {
                continue;
            }

            $data = TxtUtil::transformToArray($line);

            $this->parseFederalEntities($data);
            $this->parseMunicipalities($data);
            $this->parseZipCodes($data);
            $this->parseSettlementsTypes($data);
            $this->parseSettlements($data);
        }

        FederalEntitiesImporter::save($this->federalEntities);
        MunicipalitiesImporter::save($this->municipalities);
        ZipCodesImporter::save($this->zipCodes);
        SettlementsTypesImporter::save($this->settlementsTypes);
        SettlementsImporter::save($this->settlements);
    }

    private function parseFederalEntities(array $data)
    {
        $this->federalEntities[$data[7]]['key'] = $data[7];
        $this->federalEntities[$data[7]]['name'] = $data[4];
    }

    private function parseMunicipalities(array $data): void
    {
        $municipalityUuid = $data[7] . '_' . $data[11];

        $this->municipalities[$municipalityUuid]['key'] = $data[11];
        $this->municipalities[$municipalityUuid]['name'] = $data[3];
        $this->municipalities[$municipalityUuid]['federal_entity_key'] = intval($data[7]);
    }

    private function parseZipCodes(array $data): void
    {
        $this->zipCodes[$data[0]]['zip_code'] = $data[0];
        $this->zipCodes[$data[0]]['locality'] = $data[5];
        $this->zipCodes[$data[0]]['federal_entity_key'] = intval($data[7]);
        $this->zipCodes[$data[0]]['municipality_key'] = intval($data[11]);
    }

    private function parseSettlementsTypes(array $data): void
    {
        $this->settlementsTypes[$data[2]] = $data[2];
    }

    private function parseSettlements(array $data): void
    {
        $settlementUuid = $data[7] . '_' . $data[11] . '_' . $data[12];

        $this->settlements[$settlementUuid]['key'] = $data[12];
        $this->settlements[$settlementUuid]['name'] = $data[1];
        $this->settlements[$settlementUuid]['zone_type'] = $data[13];
        $this->settlements[$settlementUuid]['settlement_type'] =  $data[2];
        $this->settlements[$settlementUuid]['zip_code'] = $data[0];
    }
}
