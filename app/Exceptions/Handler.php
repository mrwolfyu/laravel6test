<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Auth\AuthenticationException;

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
    // public function render($request, Exception $exception)
    // {
    //     return parent::render($request, $exception);
    // }
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        return response()->json(['error' => 'Unauthenticated'], 401);
    }
    public function render($request, Exception $exception)
    {
        // This will replace our 404 response with
        // a JSON response.
       // dd($exception);
    //    if ( $exception instanceof \Symfony\Component\Routing\Exception\RouteNotFoundException || 
    //    $exception instanceof \Illuminate\Database\Eloquent\ModelNotFoundException\ModelNotFoundException ) {
    //        return response()->json([
    //            'error' => 'Resource not found'
    //        ], 404);
    //    }
        if ( $request->wantsJson()) {
            return response()->json([
                'error' => 'Resource not found'
            ], 404);
        }

        return parent::render($request, $exception);
    }
}
