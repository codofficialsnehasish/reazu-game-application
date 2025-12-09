<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', function () {
//     return redirect(route('login'));
// });

Route::view('/', 'frontend.home')->name('home');
Route::view('/terms-and-conditions', 'frontend.terms')->name('terms');
Route::view('/privacy-policy', 'frontend.privacy')->name('privacy');



use App\Http\Controllers\UserAuthController;

Route::get('/user/login', [UserAuthController::class, 'loginView'])->name('user.login');
Route::post('/user/login', [UserAuthController::class, 'login'])->name('user.login.post');

Route::middleware('auth')->group(function () {
    Route::get('/user/profile', [UserAuthController::class, 'profile'])->name('user.profile');
    Route::post('/user/profile', [UserAuthController::class, 'updateProfile'])->name('user.profile.update');

    Route::delete('/user/delete', [UserAuthController::class, 'deleteAccount'])
        ->name('user.delete');

    Route::post('/user/logout', [UserAuthController::class, 'logout'])->name('user.logout');
});


Route::get('/login', function () {
    return redirect('/dashboardv/login');
})->name('login');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
