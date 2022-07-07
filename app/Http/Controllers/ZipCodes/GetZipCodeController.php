<?php

namespace App\Http\Controllers\ZipCodes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Core
use App\Services\ZipCodes\Contracts\ZipCodeServiceInterface; 

class GetZipCodeController extends Controller
{
    private $zipCodeService;

    public function __construct(ZipCodeServiceInterface $zipCodeService)
    {
        $this->zipCodeService = $zipCodeService;
    }

    public function __invoke(Request $request)
    {        
        $zipCode = $this->zipCodeService->getZipCode($request->zipCode);

        return response()->json($zipCode, 200);
    }
}
