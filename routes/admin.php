<?php

use App\Http\Controllers\admin\AdminDashboardController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin/dashboard')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/index', [AdminDashboardController::class, 'index'])->name('dashboard');
});


Route::redirect('/admin/dashboard', '/admin/dashboard/index');
