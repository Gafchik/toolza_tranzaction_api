<?php

namespace App\Http\Classes\LogicalModels\Transaction;

use App\Models\MySql\ToolzaTranzactionApi\{
    Transactions,
    Dic_transaction_types
};

class TransactionModel
{
    public function __construct(
        private Transactions $transactions,
        private Dic_transaction_types $transactionTypes
    ) {

    }

    public function createNewTransaction(array $data): void
    {
        $this->transactions
            ->insertWithTimestamps($data);
    }
    public function getAllTransaction(array $data): array
    {
        $query = $this->transactions
            ->from($this->transactions->getTable(). ' as transactions')
            ->leftJoin(
                $this->transactionTypes->getTable() . ' as types',
                'transactions.type_id',
                '=',
                'types.id'
            )
            ->where('user_id', $data['user_id']);
        if(isset($data['type_id'])){
            $query->where('transactions.type_id', $data['type_id']);
        }
        if(isset($data['date_from']) && isset($data['date_to'])){
            $query->whereBetweenDate(
                'transactions.created_at',
                [
                    $data['date_from'],
                    $data['date_to']
                ]
            );
        }
        return $query
            ->select([
                'transactions.id',
                'transactions.user_id',
                'transactions.amount',
                'transactions.type_id',
                'transactions.description',
                'transactions.created_at',
                'transactions.updated_at',
                'types.name as type_name',
            ])
            ->orderByDesc('transactions.created_at')
            ->get()
            ->toArray();
    }
}
