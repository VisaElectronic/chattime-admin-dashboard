<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class VerifyRequest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Define a secret key. This should be a strong, unique key stored in your .env file
        // e.g., APP_REQUEST_SECRET=your_super_secret_key_here
        $secretKey = config('app.request_secret');

        if (!$secretKey) {
            Log::error('Request secret key not configured in .env for VerifyRequest middleware.');
            // Abort or handle this case appropriately if the secret key is missing
            return response()->json(['message' => 'Server configuration error.'], 500);
        }

        // Get the raw request body content
        $requestBody = $request->getContent();

        // Get the provided hash from a custom header, e.g., 'X-Signed-Key'
        $providedHash = $request->header('X-Signed-Key');

        // If no hash is provided, reject the request
        if (empty($providedHash)) {
            Log::warning('No X-Signed-Key header provided in request.', ['url' => $request->fullUrl()]);
            return response()->json(['message' => 'Unauthorized: Request signature missing.'], 401);
        }

        // Calculate the expected hash of the request body using HMAC for security
        // Use a strong hashing algorithm like SHA256
        $expectedHash = hash_hmac('sha256', $requestBody, $secretKey);

        // Compare the provided hash with the calculated hash
        if (hash_equals($expectedHash, $providedHash)) {
            // Hash matches, proceed with the request
            return $next($request);
        } else {
            // Hash mismatch, reject the request
            Log::warning('Request body hash mismatch.', [
                'url' => $request->fullUrl(),
                'provided_hash' => $providedHash,
                'expected_hash' => $expectedHash, // Only log this in development/debugging, not production
                'ip' => $request->ip(),
            ]);
            return response()->json(['message' => 'Unauthorized: Invalid request signature.'], 403);
        }
    }
}
