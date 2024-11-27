<?php

namespace App\Http\Classes\LogicalModels\Balance;

use App\Http\Classes\Structure\TransactionTypes;
use App\Models\MySql\ToolzaTranzactionApi\Transactions;

class BalanceModel
{
    public function __construct(
        private Transactions $transactions,
    ){

    }

    public function getUserBalance(int $id): ?array
    {
        return $this->transactions
            ->selectRaw(
                'SUM(CASE WHEN type_id = ? THEN amount ELSE -amount END) AS balance',
                [TransactionTypes::DEPOSIT->value]
            )
            ->where('user_id', $id)
            ->first()
            ?->toArray();
    }
}
