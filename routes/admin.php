<?php

use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\admin\BlockchainController;
use App\Http\Controllers\admin\FinanceController;
use App\Http\Controllers\admin\historyController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin/dashboard')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/index', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/addBalance', [FinanceController::class, 'addBalance'])->name('addBalance');
    Route::post('/addBalance', [FinanceController::class, 'addBalanceStore'])->name('addBalance.store');
    Route::get('/history/users', [historyController::class, 'users'])->name('history.users');
    Route::get('/history/users/stoproi/{user}', [historyController::class, 'usersStopRoi'])->name('history.users.stop.ROi');
    Route::get('/history/users/startroi/{user}', [historyController::class, 'usersStartRoi'])->name('history.users.start.ROi');
    Route::get('/history/deposits', [historyController::class, 'deposits'])->name('history.deposits');
    Route::get('/history/withdrawals', [historyController::class, 'withdrawals'])->name('history.withdrawals');
    Route::get('/history/pending/withdrawals', [historyController::class, 'pendingWithdrawals'])->name('history.withdrawals.pending');
    Route::get('/history/withdrawals/approve/{id?}', [historyController::class, 'withdrawalsApprove'])->name('history.withdrawals.approve');
    Route::get('/history/rois', [historyController::class, 'rois'])->name('history.rois');
    Route::get('/history/passive', [historyController::class, 'passive'])->name('history.passive');
    Route::get('/history/indirect', [historyController::class, 'indirect'])->name('history.indirect.commission');
    Route::get('/history/direct', [historyController::class, 'direct'])->name('history.direct.commission');
    Route::get('/history/user/plans', [historyController::class, 'userPlan'])->name('history.user.plan');
    Route::get('/history/user/plans/makepin/{id}', [historyController::class, 'makePin'])->name('history.user.plan.makePin');
    Route::get('/history/user/plans/unpin/{id}', [historyController::class, 'unPin'])->name('history.user.plan.unPin');
    Route::get('/delete/transaction/{id}', [historyController::class, 'deleteTransaction'])->name('delete.transaction');


    Route::post('login/user', [AdminDashboardController::class, 'loginUser'])->name('login.user');

    Route::get('/blockchain', [BlockchainController::class, 'index'])->name('blockchain');

});


Route::redirect('/admin/dashboard', '/admin/dashboard/index');
