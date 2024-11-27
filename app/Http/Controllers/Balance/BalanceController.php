<?php

namespace App\Http\Controllers\Balance;

use App\Exceptions\BaseExceptions\BaseException;
use App\Http\Classes\LogicalModels\Balance\Balance;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Balance\GetBalanceValidator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\Routing\Annotation\Route;

class BalanceController extends BaseController
{
    public function __construct(
        private Balance $model,
//        private GetBalanceValidator $validator,
    )
    {
        parent::__construct();
    }
    #[Route(
        name: 'api.balance.get_user_balance',
        methods: ['GET'])
    ]
    public function getUserBalance(Request $request): JsonResponse
    {
        $validator = new GetBalanceValidator();
        $userId = $request->route('user_id');
        $request->merge(['user_id' => $userId]);
        $request->validate([
            ...$validator->rules()
        ]);
        try {
            return $this->makeGoodResponse(
                $this->model->getUserBalance($userId)
            );
        }catch (BaseException $exception){
            return $this->makeBadResponse($exception);
        }
    }
}
