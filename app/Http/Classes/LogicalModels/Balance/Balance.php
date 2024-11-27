<?php

namespace App\Http\Classes\LogicalModels\Balance;

use App\Http\Facades\UserInfoFacade;

class Balance
{
    private const EMPTY_TRANSACTION_BALANCE = 0;
    public function __construct(
        private BalanceModel $model,
    ) {

    }
    public function getUserBalance(array $data): array
    {
        $user = UserInfoFacade::getUserInfoById($data['user_id']);
        $balance = $this->model->getUserBalance($data['user_id']);
        $balance = is_null($balance)
            ? self::EMPTY_TRANSACTION_BALANCE
            : $balance;
        return [
            'user' => $user,
            ...$balance,
        ];
    }
}
