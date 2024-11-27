<?php

namespace App\Exceptions\BaseExceptions\Core;

use App\Exceptions\BaseExceptions\BaseException;
use App\Http\Classes\Structure\HttpStatus;
use App\Http\Classes\Structure\Lang;

class UnauthorizedJWTException extends BaseException
{
    protected ?string $massage = 'Session lifetime has expired, Refresh the page and log in';
    protected $code = HttpStatus::HTTP_UNAUTHORIZED;
}
