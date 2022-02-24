<?php

use App\Http\Controllers\user\PlanController;
use App\Http\Controllers\user\UserDashboardController;
use Illuminate\Support\Facades\Route;


Route::redirect('/', '/login');
Route::redirect('/user/dashboard', '/user/dashboard/index');

Route::prefix('user/dashboard')->name('user.')->middleware(['auth', 'user'])->group(function () {
    Route::get('/index', [UserDashboardController::class, 'index'])->name('dashboard');
    Route::resource('/plan', PlanController::class);
});


require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
require __DIR__ . '/socialite.php';
