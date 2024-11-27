<?php

namespace App\Http\Requests\Transaction;

use App\Models\MySql\ToolzaTranzactionApi\{
    Users,
    Dic_transaction_types,
};
use Illuminate\Foundation\Http\FormRequest;

class NewTransactionValidator extends FormRequest
{
    public function rules(): array
    {
        return [
            'user_id' => [
                'required',
                'integer',
                'exists:'.Users::class.',id',
            ],
            'amount' => [
                'required',
                'integer',
                'min:1',
            ],
            'type_id' => [
                'required',
                'integer',
                'exists:'.Dic_transaction_types::class.',id',
            ],
            'description' => [
                'nullable',
                'string',
            ]
        ];
    }
}

