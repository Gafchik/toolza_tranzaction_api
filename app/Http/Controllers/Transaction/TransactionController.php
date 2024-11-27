<?php

namespace App\Http\Controllers\Transaction;

use App\Exceptions\BaseExceptions\BaseException;
use App\Http\Classes\LogicalModels\Transaction\Transaction;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Transaction\{
    NewTransactionValidator,
    GetTransactionValidator,
};
use Illuminate\Http\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class TransactionController extends BaseController
{
    public function __construct(
        private Transaction $model,
    )
    {
        parent::__construct();
    }
    #[Route(
        name: 'api.transactions.get_all_transaction',
        methods: ['GET'])
    ]
    public function getAllTransaction(GetTransactionValidator $validator): JsonResponse
    {
        try {
            return $this->makeGoodResponse(
                $this->model->getAllTransaction($validator->validated())
            );
        }catch (BaseException $exception){
            return $this->makeBadResponse($exception);
        }
    }
    #[Route(
        name: 'api.transactions.create_new_transaction',
        methods: ['POST'])
    ]
    public function createNewTransaction(NewTransactionValidator $validator): JsonResponse
    {
        try {
            $this->model->createNewTransaction($validator->validated());
            return $this->makeGoodResponse([]);
        }catch (BaseException $exception){
            return $this->makeBadResponse($exception);
        }
    }
}
