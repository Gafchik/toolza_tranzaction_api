<?php

namespace App\Http\Requests\Balance;

use App\Models\MySql\ToolzaTranzactionApi\Users;
use Illuminate\Foundation\Http\FormRequest;

class GetBalanceValidator extends FormRequest
{
    public function rules(): array
    {
        return [
            'user_id' => [
                'required',
                'integer',
                'exists:'.Users::class.',id',
            ],
        ];
    }
}
