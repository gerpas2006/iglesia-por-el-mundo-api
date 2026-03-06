<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->api(prepend: [
            \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
        ]);

        $middleware->alias([
            'verified' => \App\Http\Middleware\EnsureEmailIsVerified::class,
        ]);

        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        // Manejo de excepciones de modelo no encontrado
        $exceptions->render(function (Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Recurso no encontrado',
                'error' => 'El recurso solicitado no existe',
                'status' => 404
            ], 404);
        });

        // Manejo de excepciones de validación
        $exceptions->render(function (Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'Error de validación',
                'errors' => $e->errors(),
                'status' => 422
            ], 422);
        });

        // Manejo de excepciones de autenticación
        $exceptions->render(function (Illuminate\Auth\AuthenticationException $e) {
            return response()->json([
                'message' => 'No autenticado',
                'error' => 'Debes estar autenticado para acceder a este recurso',
                'status' => 401
            ], 401);
        });

        // Manejo de excepciones de autorización
        $exceptions->render(function (Illuminate\Auth\Access\AuthorizationException $e) {
            return response()->json([
                'message' => 'No autorizado',
                'error' => 'No tienes permisos para realizar esta acción',
                'status' => 403
            ], 403);
        });

        // Manejo de excepciones de ruta no encontrada
        $exceptions->render(function (Symfony\Component\HttpKernel\Exception\NotFoundHttpException $e) {
            return response()->json([
                'message' => 'Ruta no encontrada',
                'error' => 'El endpoint solicitado no existe',
                'status' => 404
            ], 404);
        });

        // Manejo de excepciones de método no permitido
        $exceptions->render(function (Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException $e) {
            return response()->json([
                'message' => 'Método no permitido',
                'error' => 'El método HTTP utilizado no está permitido para este endpoint',
                'status' => 405
            ], 405);
        });

        // Manejo de excepciones de integridad de base de datos
        $exceptions->render(function (Illuminate\Database\QueryException $e) {
            return response()->json([
                'message' => 'Error de base de datos',
                'error' => 'Ocurrió un error al procesar tu solicitud en la base de datos',
                'status' => 500
            ], 500);
        });

        // Manejo general de excepciones
        $exceptions->render(function (Exception $e) {
            return response()->json([
                'message' => 'Error interno del servidor',
                'error' => $e->getMessage(),
                'status' => 500
            ], 500);
        });
    })->create();
