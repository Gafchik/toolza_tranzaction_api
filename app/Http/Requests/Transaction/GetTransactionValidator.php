<?php

namespace App\Http\Requests\Transaction;

use App\Http\Classes\Structure\CDateTime;
use App\Models\MySql\ToolzaTranzactionApi\Dic_transaction_types;
use App\Models\MySql\ToolzaTranzactionApi\Users;
use Illuminate\Foundation\Http\FormRequest;

class GetTransactionValidator extends FormRequest
{
    public function rules(): array
    {
        return [
            'user_id' => [
                'required',
                'integer',
                'exists:'.Users::class.',id',
            ],
            'type_id' => [
                'nullable',
                'integer',
                'exists:'.Dic_transaction_types::class.',id',
            ],
            'date_from' => [
                'nullable',
                'date_format:'.CDateTime::DATE_FORMAT_DB,
                'before_or_equal:date_to',
                'required_with:date_to',
            ],
            'date_to' => [
                'nullable',
                'date_format:'.CDateTime::DATE_FORMAT_DB,
                'before_or_equal:date_from',
                'required_with:date_from',
            ],
        ];
    }
}
