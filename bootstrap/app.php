<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\CheckGenre;
use App\Http\Middleware\LogRequest;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    
    ->withMiddleware(function (Middleware $middleware) {
    // I-register ang custom middleware mo dito
    $middleware->alias([
        'check.genre' => \App\Http\Middleware\CheckGenre::class,
    ]);
})

    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
