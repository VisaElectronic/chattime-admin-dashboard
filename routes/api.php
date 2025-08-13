<?php

use App\Http\Controllers\API\V1\AuthController;
use Illuminate\Support\Facades\Route;

Route::middleware('verify-request')->group(function () {
    Route::post('/send-registration-verify', [AuthController::class, 'sendVerifyEmail']);
});
