<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\NbpService;
use Illuminate\Http\Request;

class RatesController extends Controller
{
    public function getRates(NbpService $nbpService)
    {
        return $nbpService->getRates();
    }
}
