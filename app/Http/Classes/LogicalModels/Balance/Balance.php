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
    public function getUserBalance(int $userId): array
    {
        $user = UserInfoFacade::getUserInfoById($userId);
        $balance = $this->model->getUserBalance($userId);
        $balance = is_null($balance['balance'])
            ? ['balance' => self::EMPTY_TRANSACTION_BALANCE]
            : $balance;
        return [
            'user' => $user,
            ...$balance,
        ];
    }
}
