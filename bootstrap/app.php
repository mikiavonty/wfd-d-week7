<?php

use App\Http\Middleware\AddHeaderMiddleware;
use App\Http\Middleware\CheckAge;
use App\Http\Middleware\EnsureJoblistingExists;
use App\Http\Middleware\LogRequest;
use App\Http\Middleware\TerminatingMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Routing\Router;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'log.request' => LogRequest::class,
            'add.header.middleware' => AddHeaderMiddleware::class,
            'ensure.joblisting.exists' => EnsureJoblistingExists::class,
            'check.age' => CheckAge::class,
            'terminating.middleware' => TerminatingMiddleware::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
