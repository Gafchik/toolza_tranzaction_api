<?php

namespace App\Http\Classes\LogicalModels\Transaction;

class Transaction
{
    public function __construct(
        private TransactionModel $model,
    ){

    }
    public function createNewTransaction(array $data): void
    {
        $this->model->createNewTransaction($data);
    }
    public function getAllTransaction(array $data): array
    {
        return $this->model->getAllTransaction($data);
    }
}
