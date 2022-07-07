<?php

namespace App\Http\Controllers\ZipCodes;

use App\Http\Controllers\Controller;

// Core
use App\Http\Requests\ZipCodes\ImportFromTxtRequest;
use App\Services\ZipCodes\Contracts\ZipCodeServiceInterface; 

class ImportFromTxtController extends Controller
{
    private $zipCodeService;

    public function __construct(ZipCodeServiceInterface $zipCodeService)
    {
        $this->zipCodeService = $zipCodeService;
    }

    public function __invoke(ImportFromTxtRequest $request)
    {                
        $this->zipCodeService->importFromTxt($request->file('data'));

        return response()->json('ok', 200);
    }
}
