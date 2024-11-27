<?php

namespace App\Http\Controllers;

use App\Exceptions\BaseExceptions\BaseException;
use App\Http\Facades\ResponseFacade;
use Illuminate\Http\JsonResponse;

class BaseController extends Controller
{
    public function __construct()
    {
        $this->app = app();
    }

    protected function makeGoodResponse(array $data): JsonResponse
    {
        return ResponseFacade::makeGoodResponse($data);
    }

    protected function makeBadResponse(BaseException $e): JsonResponse
    {
        return ResponseFacade::makeBadResponse($e);
    }

}
