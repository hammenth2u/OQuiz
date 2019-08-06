<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
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
     * @return \Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     */
    public function render($request, Exception $exception)
    {
             // dump($exception);exit;
        // Si l'erreur est NotFoundHttpException (404)
        if ($exception instanceof NotFoundHttpException) {
            // Alors on affiche notre jolie page 404
            return view('error.404');
        }
        // Gestion des 403 - Forbidden
        else if ($exception instanceof HttpException) {
            // On vérifié le StatusCode
            if ($exception->getStatusCode() == 403) {
                return view('error.403');
            }
        }
        // Sinon, dans tous les autres cas,
        // on laisse l'affichage des erreurs par défaut
        return parent::render($request, $exception);   
    }
}
