<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });

        // Handle specific API exceptions
        $this->renderable(function (NotFoundHttpException $e, $request) {
            if ($request->is('api/*')) { // Check if the request is for an API route
                return new JsonResponse([
                    'message' => 'Resource not found.',
                    'error' => $e->getMessage(),
                ], 404);
            }
        });

        $this->renderable(function (ModelNotFoundException $e, $request) {
            if ($request->is('api/*')) {
                return new JsonResponse([
                    'message' => 'Entry for ' . str_replace('App\\Models\\', '', $e->getModel()) . ' not found.',
                    'error' => $e->getMessage(),
                ], 404);
            }
        });

        $this->renderable(function (ValidationException $e, $request) {
            if ($request->is('api/*')) {
                return new JsonResponse([
                    'message' => 'Validation failed.',
                    'errors' => $e->errors(),
                ], 422);
            }
        });

        // Handle generic exceptions for API requests
        $this->renderable(function (Throwable $e, $request) {
            if ($request->is('api/*')) {
                // Log the exception for debugging
                Log::error($e);

                // Return a generic error response for production
                if (config('app.debug')) {
                    return new JsonResponse([
                        'message' => 'An unexpected error occurred.',
                        'error' => $e->getMessage(),
                        'trace' => $e->getTrace(), // Only show trace in debug mode
                    ], 500);
                } else {
                    return new JsonResponse([
                        'message' => 'An unexpected error occurred.',
                    ], 500);
                }
            }
        });
    }
}