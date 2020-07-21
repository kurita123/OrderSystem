<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Session\TokenMismatchException;
use Illuminate\Support\ViewErrorBag;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

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
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

  

    /**
     * Render the given HttpException.
     *
     * @param  \Symfony\Component\HttpKernel\Exception\HttpExceptionInterface  $e
     * @return \Symfony\Component\HttpFoundation\Response
     */
    //401遷移時リダイレクト
    protected function renderHttpException(HttpExceptionInterface $e)
    {
        $this->registerErrorViewPaths();

        // 「the page has expired due to inactivity. please refresh and try again」を表示させない
        if ($e->getStatusCode() === 419) {
            return redirect('/');
        }

        if (view()->exists($view = "errors::{$e->getStatusCode()}")) {
            return response()->view($view, [
                'errors' => new ViewErrorBag,
                'exception' => $e,
            ], $e->getStatusCode(), $e->getHeaders());
        }

        return $this->convertExceptionToResponse($e);
    }

    //未ログイン時リダイレクト
    public function unauthenticated($request, AuthenticationException $exception)
    {
        if($request->expectsJson()){
            return response()->json(['message' => $exception->getMessage()], 401);
        }
 
        if (in_array('admin', $exception->guards())) {
            return redirect()->guest(route('admin.login'));
        }
 
        return redirect()->guest(route('user.login'));
    }
}
