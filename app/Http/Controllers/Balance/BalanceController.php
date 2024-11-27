<?php

namespace App\Http\Controllers\Balance;

use App\Exceptions\BaseExceptions\BaseException;
use App\Http\Classes\LogicalModels\Balance\Balance;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Balance\GetBalanceValidator;
use Illuminate\Http\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class BalanceController extends BaseController
{
    public function __construct(
        private Balance $model
    )
    {
        parent::__construct();
    }
    #[Route(
        name: 'api.balance.get_user_balance',
        methods: ['GET'])
    ]
    public function getUserBalance(GetBalanceValidator $validator): JsonResponse
    {
        try {
            return $this->makeGoodResponse(
                $this->model->getUserBalance($validator->validated())
            );
        }catch (BaseException $exception){
            return $this->makeBadResponse($exception);
        }
    }
}
