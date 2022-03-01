<?php

use App\Http\Controllers\landing\LandingController;
use App\Http\Controllers\user\CoinPaymentController;
use App\Http\Controllers\user\PlanController;
use App\Http\Controllers\user\ProfileController;
use App\Http\Controllers\user\StatementController;
use App\Http\Controllers\user\TeamController;
use App\Http\Controllers\user\UserDashboardController;
use App\Http\Controllers\user\WithdrawController;
use Illuminate\Support\Facades\Route;


Route::get('/', [LandingController::class,'index'])->name('landing');
Route::redirect('/user/dashboard', '/user/dashboard/index');

Route::prefix('user/dashboard')->name('user.')->middleware(['auth', 'user'])->group(function () {
    Route::get('/index', [UserDashboardController::class, 'index'])->name('dashboard');
    Route::post('/plan/activate', [PlanController::class, 'activate'])->name('plan.activate');
    Route::resource('/plan', PlanController::class);
    Route::get('/withdraw', [WithdrawController::class, 'index'])->name('withdraw.index');
    Route::post('/withdraw', [WithdrawController::class, 'store'])->name('withdraw.store');
    Route::get('/statement/deposits', [StatementController::class,'deposits'])->name('statement.deposits');
    Route::get('/statement/withdrawals', [StatementController::class,'withdrawals'])->name('statement.withdrawals');
    Route::get('/statement/roi', [StatementController::class,'roi'])->name('statement.roi');
    Route::get('/statement/direct', [StatementController::class,'direct'])->name('statement.direct');
    Route::get('/statement/inDirect', [StatementController::class,'inDirect'])->name('statement.inDirect');
    Route::get('/statement/passive', [StatementController::class,'passive'])->name('statement.passive');
    Route::get('/profile/index', [ProfileController::class,'index'])->name('profile.index');
    Route::post('/profile/index', [ProfileController::class,'store'])->name('profile.store');
    Route::get('/profile/password/change', [ProfileController::class,'passwordChange'])->name('profile.password.change');
    Route::post('/profile/password/update', [ProfileController::class,'passwordupdate'])->name('profile.password.update');
    Route::get('/team/{id?}', [TeamController::class,'index'])->name('team.index');
});

// group route
Route::prefix('payment')->group(function () {
    Route::post('/webhook',[CoinPaymentController::class,'webhook'])->name('webhook');
});


require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
require __DIR__ . '/socialite.php';
