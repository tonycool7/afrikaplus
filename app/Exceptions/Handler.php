<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Jrean\UserVerification\Exceptions\UserNotVerifiedException;

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
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
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
        if($exception instanceof UserNotVerifiedException){
            if($request->getRequestUri() == "/shop/account"){
                return redirect('/shop/nonactivated');
            }
            return redirect('/nonactivated');
        }

        return view('error.error');

        return parent::render($request, $exception);
    }


    public function unauthenticated($request, AuthenticationException $exception)
    {
        $guard = ($exception->guards()) ? $exception->guards()[0] : '';
        if($guard == "shopUser"){
            return redirect('/shop/login');
        }

//        return $request->expectsJson()
//            ? response()->json(['message' => $exception->getMessage()], 401)
//            : redirect()->guest(route('login'));

        return redirect('/login');
    }
}
