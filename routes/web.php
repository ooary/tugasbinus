<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;



// Home Route
Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

// Product Routes
Route::resource('products', ProductController::class);

// Sale Routes
Route::resource('sales', SaleController::class);

// Customer Routes (if you want to manage customers separately)
Route::resource('customers', CustomerController::class);
