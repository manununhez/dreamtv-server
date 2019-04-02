<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use League\OAuth2\Server\Exception\OAuthServerException;
use Psr\Log\LoggerInterface;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
       
        \League\OAuth2\Server\Exception\OAuthServerException::class,
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
        if ($exception instanceof OAuthServerException) {
            try {
                $logger = $this->container->make(LoggerInterface::class);
            } catch (Exception $e) {
                throw $exception; // throw the original exception
            }
            $logger->error(
                $exception->getMessage(),
                ['exception' => $exception]
            );
        } else {
            parent::report($exception);
        }
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
        return parent::render($request, $exception);
    }
}
