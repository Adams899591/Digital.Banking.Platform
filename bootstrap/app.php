<?php

use App\Http\Middleware\AdminOnlineOfflineIndecatorsMiddleware;
use App\Http\Middleware\OnlineOfflineIndecatorsMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        channels: __DIR__.'/../routes/channels.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // Register global middleware here
        $middleware->alias([
            // Other middleware aliases...
            'online.offline.indicators' => OnlineOfflineIndecatorsMiddleware::class,
            "admin.online.offline.indicators" =>  AdminOnlineOfflineIndecatorsMiddleware::class,
        ]);
    }) 

    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
