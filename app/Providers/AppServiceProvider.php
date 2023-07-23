<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Register the custom response macro

        // 2xx (Success):

        // 200 OK
        // 201 Created
        // 202 Accepted
        // 204 No Content
        response()->macro('success', function ($data = null, $message = null, $status = 200) {
            return response()->json([
                'success' => true,
                'message' => $message,
                'data' => $data,
            ], $status);
        });

        // 3xx (Redirection):

        // 300 Multiple Choices
        // 301 Moved Permanently
        // 302 Found (or Moved Temporarily)
        // 304 Not Modified
        response()->macro('redirection', function ($data = null, $message = null, $status = 300) {
            return response()->json([
                'success' => false,
                'message' => $message,
                'data' => $data,
            ], $status);
        });

        // 4xx (Client Error):

        // 400 Bad Request
        // 401 Unauthorized
        // 403 Forbidden
        // 404 Not Found
        // 405 Method Not Allowed
        // 422 Unprocessable Entity
        // 429 Too Many Requests
        response()->macro('failure', function ($data = null, $message = null, $status = 400) {
            return response()->json([
                'success' => false,
                'message' => $message,
                'data' => $data,
            ], $status);
        });

        // 5xx (Server Error):

        // 500 Internal Server Error
        // 502 Bad Gateway
        // 503 Service Unavailable
        // 504 Gateway Timeout
        response()->macro('error', function ($data = null, $message = null, $status = 500) {
            return response()->json([
                'success' => false,
                'message' => $message,
                'data' => $data,
            ], $status);
        });
    }
}
