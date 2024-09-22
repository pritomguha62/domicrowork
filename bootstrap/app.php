<?php

use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\AdminPanelMiddleware;
use App\Http\Middleware\ClientMiddleware;
use App\Http\Middleware\DeveloperMiddleware;
use App\Http\Middleware\EmailVerifiedMiddleware;
use App\Http\Middleware\EmailVerifyMiddleware;
use App\Http\Middleware\LoginAdminMiddleware;
use App\Http\Middleware\LoginMemberMiddleware;
use App\Http\Middleware\StatusMiddleware;
use App\Http\Middleware\WorkerMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {

        $middleware->alias([
        'developer' => DeveloperMiddleware::class,
        'admin_panel' => AdminPanelMiddleware::class,
        'admin' => AdminMiddleware::class,
        'worker' => WorkerMiddleware::class,
        'client' => ClientMiddleware::class,
        'logged_in_admin' => LoginAdminMiddleware::class,
        'logged_in_member' => LoginMemberMiddleware::class,
        'email_verify' => EmailVerifyMiddleware::class,
        'email_verified' => EmailVerifiedMiddleware::class,
        'status_check' => StatusMiddleware::class,
        ]);

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();


