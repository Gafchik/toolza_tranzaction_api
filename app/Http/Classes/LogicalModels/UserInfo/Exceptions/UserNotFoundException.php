<?php

namespace App\Http\Classes\LogicalModels\UserInfo\Exceptions;

use App\Exceptions\BaseExceptions\BaseException;
use App\Http\Classes\Structure\HttpStatus;

class UserNotFoundException extends BaseException
{
    protected ?string $massage = 'user not found id: %s';

    protected $code = HttpStatus::HTTP_UNPROCESSABLE_ENTITY;
}
