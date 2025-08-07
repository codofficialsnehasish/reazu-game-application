<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\{
    AuthController,
    GameApiController,
    FaqApiController,
    WalletApiController,
    LegalContentApiController,
};

Route::post('/register', [AuthController::class, 'register']);
Route::post('/register/send-otp', [AuthController::class, 'sendOtpForRegister']);
Route::post('/register/verify', [AuthController::class, 'verifyOtpAndRegister']);

Route::post('/login', [AuthController::class, 'login']);
Route::post('/forgot-password', [AuthController::class, 'sendOtpForForgotPassword']);
Route::post('/forgot-password/verify', [AuthController::class, 'verifyOtpForForgotPassword']);

Route::post('/reset-password', [AuthController::class, 'resetPassword']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/update-profile', [AuthController::class, 'updateProfile']);
    Route::get('/leaderboard', [AuthController::class, 'leaderboard']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::delete('/delete-account', [AuthController::class, 'deleteAccount']);

    Route::controller(GameApiController::class)->group(function () {
        Route::get("/our-games",'our_games');
        Route::get("/guide",'guide');
        Route::post('/submit-point','submit_point');
        Route::get("/leaderboard",'leaderboard');
    });

    Route::get('/faqs', [FaqApiController::class, 'index']);

    Route::controller(WalletApiController::class)->group(function () {
        Route::get("/payment-methods",'get_payment_methods');
        Route::get("/subscription-plans",'get_subscription_plans');
    });

    Route::get('/legal-content', [LegalContentApiController::class, 'index']);
});
