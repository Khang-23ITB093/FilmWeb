<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
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
            //
        });

        $this->renderable(function (Throwable $e, $request) {
            if ($request->expectsJson()) {
                // For ValidationException, let Laravel handle it to get the structured error messages
                if ($e instanceof \Illuminate\Validation\ValidationException) {
                    return $e->getResponse();
                }

                // For other exceptions, return a generic JSON error response
                $statusCode = method_exists($e, 'getStatusCode') ? $e->getStatusCode() : 500;
                $message = $e->getMessage() ?: 'Server Error';
                
                // If APP_DEBUG is true, include more details
                $detail = config('app.debug') ? [
                    'message' => $e->getMessage(),
                    'exception' => get_class($e),
                    'file' => $e->getFile(),
                    'line' => $e->getLine(),
                    'trace' => collect($e->getTrace())->map(function ($trace) {
                        return \Illuminate\Support\Arr::except($trace, ['args']);
                    })->all(),
                ] : null;

                return response()->json([
                    'message' => $message,
                    'errors' => $detail,
                ], $statusCode);
            }
        });
    }
}
