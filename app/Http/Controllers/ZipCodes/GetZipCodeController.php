<?php

namespace App\Http\Controllers\ZipCodes;

use App\Http\Controllers\Controller;

// Core
use App\Utils\ResponseJsonUtil;
use App\Services\ZipCodes\Contracts\ZipCodeServiceInterface;

class GetZipCodeController extends Controller
{
    private $zipCodeService;

    public function __construct(ZipCodeServiceInterface $zipCodeService)
    {
        $this->zipCodeService = $zipCodeService;
    }

    /**
     * @OA\Info(
     *      version="1.0.0",
     *      title="Zip Codes API",
     *      description="Zip Codes API permite consultar todos los códigos postales, con sus respectivas entidades federales, municipios y asentamientos de México.",
     *      @OA\Contact(
     *          email="moisesdavidaaron@gmail.com"
     *      ),
     *      @OA\License(
     *          name="Apache 2.0",
     *          url="http://www.apache.org/licenses/LICENSE-2.0.html"
     *      )     
     * )
     * @OA\Server(
     *      url=L5_SWAGGER_CONST_HOST,
     *      description=L5_SWAGGER_CONST_HOST_DESCRIPTION
     * ),
     *
     * @OA\Get(
     *     path="/api/zip-codes/{zip_code}",
     *     summary="Encuentra código postal por número.",
     *     tags={"Códigos Postales"},
     *     description="Devuelve un código postal.",      
     *     @OA\Parameter(
     *         name="zip_code",
     *         in="path",
     *         description="Código postal.",
     *         required=true,
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Operación exitosa.",
     *         content={
     *              @OA\MediaType(
     *                  mediaType="application/json",
     *                      @OA\Schema(
     *                          @OA\Property(
     *                              property="status",
     *                              type="boolean",
     *                              description="Status"
     *                          ),
     *                          @OA\Property(
     *                              property="code",
     *                              type="integer",
     *                              description="Code"
     *                          ),
     *                          @OA\Property(
     *                              property="data",
     *                              type="object",
     *                              description="Data",
     *                          ),
     *                          example={
     *                              "zip_code": "20000",
     *                              "locality": "Aguascalientes",
     *                              "federal_entity": {
     *                                  "name": "Aguascalientes",
     *                                  "code": null,
     *                                  "key": 1
     *                              },
     *                              "settlements": {
     *                                  "name": "Aguascalientes Centro",
     *                                  "zone_type": "Urbano",
     *                                  "key": 1,
     *                                  "settlement_type": {
     *                                      "name": "Colonia"
     *                                  }
     *                              },    
     *                              "municipality": {
     *                                  "name": "Aguascalientes",
     *                                  "key": 1
     *                              }
     *                          },
     *                      )     
     *              )     
     *         }
     *     ),      
     *     @OA\Response(
     *         response="404",
     *         description="Código postal no encontrado."
     *     ),
     *     @OA\Response(
     *         response="500",
     *         description="Error de servidor interno."
     *     )
     * )
     */
    public function __invoke(String $zipCode)
    {
        $zipCode = $this->zipCodeService->getZipCode($zipCode);
        
        return ResponseJsonUtil::data($zipCode);
    }
}
