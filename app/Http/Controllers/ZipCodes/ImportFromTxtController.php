<?php

namespace App\Http\Controllers\ZipCodes;

use App\Http\Controllers\Controller;

// Core
use App\Utils\ResponseJsonUtil;
use App\Http\Requests\ZipCodes\ImportFromTxtRequest;
use App\Services\ZipCodes\Contracts\ZipCodeServiceInterface;

class ImportFromTxtController extends Controller
{
    private $zipCodeService;

    public function __construct(ZipCodeServiceInterface $zipCodeService)
    {
        $this->zipCodeService = $zipCodeService;
    }

    /**
     * @OA\Post(
     *     path="/api/zip-codes/import/txt",
     *     summary="Importa la base de datos desde txt.",     
     *     tags={"Códigos Postales"},
     *     description="Importa códigos postales dado un txt. Este proceso puede demorar hasta 30 minutos.",
     *     @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(
     *              mediaType="multipart/form-data",
     *                  @OA\Schema(
     *                      type="object",
     *                          @OA\Property(
     *                              property="file",
     *                              type="file",
     *                              description="Archivo txt",     
     *                          ),
     *                      )
     *               )
     *          ),
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
     *                              property="message",
     *                              type="string",
     *                              description="Message",
     *                          ),
     *                          example={
     *                              "status": true,
     *                              "code": 200,
     *                              "message": "Operación exitosa."
     *                          },
     *                      )     
     *              )     
     *         }
     *     ),           
     *     @OA\Response(
     *         response="422",
     *         description="Los datos proporcionados no son válidos."
     *     ),
     *     @OA\Response(
     *         response="500",
     *         description="Error de servidor interno."
     *     )        
     *  )
     */

    public function __invoke(ImportFromTxtRequest $request)
    {
        $this->zipCodeService->importFromTxt($request->file('file'));

        return ResponseJsonUtil::ok('Operación exitosa.');
    }
}
