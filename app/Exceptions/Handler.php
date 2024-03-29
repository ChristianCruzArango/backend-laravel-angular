<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        $exception = $this->prepareException($exception);

    if ($exception instanceof \Illuminate\Http\Exception\HttpResponseException) {
        return $exception->getResponse();
    }
    if ($exception instanceof \Illuminate\Validation\ValidationException) {
        return $this->convertValidationExceptionToResponse($exception, $request);
    }

    $response = [];

    $statusCode = 500;
    if (method_exists($exception, 'getStatusCode')) {
        $statusCode = $exception->getStatusCode();
    }

    switch ($statusCode) {
        case 404:
            $response['error'] = 'Pagina no encontrada';
            break;

        case 403:
            $response['error'] = 'Prohibido';
            break;

        default:
            $response['error'] = $exception->getMessage();
            break;
    }
    return response()->json($response, $statusCode);
    }
}
