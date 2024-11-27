<?php

namespace App\Exceptions\BaseExceptions;

use App\Http\Classes\Structure\{
    HttpStatus,
};
use Exception;

class BaseException extends Exception
{
    const DEF_ERROR = 'An unspecified error';
    protected ?string $massage = null;

    protected $code = HttpStatus::HTTP_INTERNAL_SERVER_ERROR;

    public function __construct(...$args)
    {
        $app = app();
        $this->formattedString(...$args);
        $messageAll = $this->message ?? self::DEF_ERROR;

        parent::__construct(
            message: $this->formattedString(...$args),
            code:$this->code,
        );
    }

    protected function formattedString(): string
    {
        $prepareData = [];
        if (func_get_args() > 0) {
            foreach (func_get_args() as $index => $param) {
                $prepareData[] = $param;
            }
        }
        return is_null($this->massage)
            ? self::DEF_ERROR
            : sprintf($this->massage, ...$prepareData);
    }
}
