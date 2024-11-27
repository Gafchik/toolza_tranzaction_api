<?php

namespace App\Exceptions\BaseExceptions\Core;

use App\Exceptions\BaseExceptions\BaseException;
use App\Http\Classes\Structure\{
    HttpStatus,
};

class BaseValidationException extends BaseException
{
    protected ?string $massage = 'Validation error: %s';

    protected $code = HttpStatus::HTTP_BAD_REQUEST;
}
