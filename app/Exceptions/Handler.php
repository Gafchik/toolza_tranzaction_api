<?php

namespace App\Exceptions;

use App\Exceptions\BaseExceptions\Core\BaseValidationException;
use App\Exceptions\BaseExceptions\Core\UnauthorizedJWTException;
use App\Http\Facades\ResponseFacade;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            return ResponseFacade::makeBadResponse(new BaseValidationException($e->getMessage()));
        });
        $this->renderable(function (Throwable $e, $request) {
            if($e instanceof UnauthorizedHttpException){
                return ResponseFacade::makeBadResponse(new UnauthorizedJWTException($e->getMessage()));
            }
            return ResponseFacade::makeBadResponse(new BaseValidationException($e->getMessage()));
        });
    }
}
