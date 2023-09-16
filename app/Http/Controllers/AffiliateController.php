<?php

namespace App\Http\Controllers;

use App\Services\CalculatorService;
use App\Services\FileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AffiliateController extends Controller
{
    private string $fileName = 'affiliates.txt';
    private float $defaultOfficeLatitude = 53.3340285;
    private float $defaultOfficeLongitude = -6.2535495;
    private float $defaultDistance = 100;


    private FileService $fileService;
    private CalculatorService $calculatorService;

    public function __construct(FileService $fileService, CalculatorService $calculatorService)
    {
        $this->fileService = $fileService;
        $this->calculatorService = $calculatorService;
    }

    public function index(Request $request)
    {
        $distance = $request->query('distance');
        $distance = is_numeric($distance) ? (float)$distance : $this->defaultDistance;

        $fileParsingResult = $this->fileService->parseFile(Storage::path($this->fileName));
        $affiliates = collect($fileParsingResult);

        foreach ($affiliates as $affiliate) {
            $distanceFromTarget = $this->calculatorService->calculateDistanceInKms($this->defaultOfficeLatitude, $this->defaultOfficeLongitude, $affiliate->latitude, $affiliate->longitude);
            $affiliate->distance = $distanceFromTarget;

            $affiliate->invited = false;
            if ($distanceFromTarget <= $distance) {
                $affiliate->invited = true;
            }
        }

        $affiliates = $affiliates->sortBy([
            ['invited', 'desc'],
            ['affiliate_id', 'asc'],
        ]);

        return view('affiliates', compact('affiliates'));
    }
}
