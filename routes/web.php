<?php

use App\Http\Controllers\user\PlanController;
use App\Http\Controllers\user\StatementController;
use App\Http\Controllers\user\UserDashboardController;
use Illuminate\Support\Facades\Route;


Route::redirect('/', '/login');
Route::redirect('/user/dashboard', '/user/dashboard/index');

Route::prefix('user/dashboard')->name('user.')->middleware(['auth', 'user'])->group(function () {
    Route::get('/index', [UserDashboardController::class, 'index'])->name('dashboard');
    Route::resource('/plan', PlanController::class);
    Route::get('/statement/deposits', [StatementController::class,'deposits'])->name('statement.deposits');
    Route::get('/statement/withdrawals', [StatementController::class,'withdrawals'])->name('statement.withdrawals');
    Route::get('/statement/roi', [StatementController::class,'roi'])->name('statement.roi');
    Route::get('/statement/direct', [StatementController::class,'direct'])->name('statement.direct');
    Route::get('/statement/inDirect', [StatementController::class,'inDirect'])->name('statement.inDirect');
    Route::get('/statement/passive', [StatementController::class,'passive'])->name('statement.passive');
});


require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
require __DIR__ . '/socialite.php';
