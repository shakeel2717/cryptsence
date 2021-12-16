<?php

use App\Http\Controllers\seller\Auth\RegisterController;
use App\Http\Controllers\seller\SellerDashboardController;
use Illuminate\Support\Facades\Route;


Route::prefix('seller')->name('seller.')->middleware(['guest'])->group(function () {
    Route::get('/register', [RegisterController::class,'register'])->name('register');
});


Route::prefix('seller/dashboard')->name('seller.')->middleware(['auth', 'seller'])->group(function () {
    Route::get('/index', [sellerDashboardController::class, 'index'])->name('dashboard');
});


Route::redirect('/seller/dashboard', '/seller/dashboard/index');