<?php

namespace App\Exceptions;

use App\Domain\GoogleTranslate\GoogleTranslateAPIException;
use App\Domain\GoogleTranslate\GoogleTranslateResponse;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
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
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $exception)
    {
        if ($exception instanceof GoogleTranslateAPIException) {
            $googleResponse = app()->make(GoogleTranslateResponse::class);
            $googleResponse->success = false;
            $googleResponse->translation = '';
            $googleResponse->error = $exception->getMessage();
            return response()->json(collect($googleResponse),422);
        }
        return parent::render($request, $exception);
    }
}
