<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Definisikan alias middleware
        $middleware->alias([
            'admin' => \App\Http\Middleware\Admin::class,
            'user' => \App\Http\Middleware\User::class,
            'mobile' => \App\Http\Middleware\Mobile::class,
            'web' => \App\Http\Middleware\Web::class,
            'kurir' => \App\Http\Middleware\Kurir::class,
        ]);

        // Definisikan grup middleware untuk api
        $middleware->group('api', [
            \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // Definisikan pengecualian di sini jika diperlukan
    })->create();
