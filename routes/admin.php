<?php

use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\admin\FinanceController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin/dashboard')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/index', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/addBalance', [FinanceController::class, 'addBalance'])->name('addBalance');
    Route::post('/addBalance', [FinanceController::class, 'addBalanceStore'])->name('addBalance.store');

});


Route::redirect('/admin/dashboard', '/admin/dashboard/index');
