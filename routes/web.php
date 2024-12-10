<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\CashierAuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\OrderController;

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    
    // Admin Login and Registration Routes
    Route::get('login', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AdminAuthController::class, 'login']);
    Route::get('register', [AdminAuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [AdminAuthController::class, 'register']);
    
    // Admin Profile and Password Routes
  Route::middleware(['auth:admin'])->get('profile', [AdminAuthController::class, 'showChangeProfileForm'])->name('change-profile');
Route::middleware(['auth:admin'])->post('profile', [AdminAuthController::class, 'updateProfile'])->name('update-profile');

    Route::middleware(['auth:admin'])->get('password', [AdminAuthController::class, 'showChangePasswordForm'])->name('change-password');
    Route::middleware(['auth:admin'])->post('password', [AdminAuthController::class, 'updatePassword'])->name('update-password');
    
    // Admin Dashboard Routes
    Route::middleware(['auth:admin'])->get('dashboard', [AdminAuthController::class, 'dashboard'])->name('dashboard');
    
    // Admin Product Routes
    Route::middleware(['auth:admin'])->get('products', [ProductController::class, 'create'])->name('products');
    Route::middleware(['auth:admin'])->post('products', [ProductController::class, 'store'])->name('products.store');
    Route::middleware(['auth:admin'])->get('products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::middleware(['auth:admin'])->put('products/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::middleware(['auth:admin'])->delete('products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
    
    // Admin Expense Routes
    Route::middleware(['auth:admin'])->get('expenses', [ExpenseController::class, 'index'])->name('expenses.index');
    Route::middleware(['auth:admin'])->post('expenses/store', [ExpenseController::class, 'store'])->name('expenses.store');
    Route::middleware(['auth:admin'])->delete('expenses/{id}', [ExpenseController::class, 'destroy'])->name('expenses.destroy');
   Route::delete('/cashier/{id}', [AdminAuthController::class, 'destroy'])->name('cashier.destroy');
    
    // Admin Cashier Routes
    Route::middleware(['auth:admin'])->get('cashier', [AdminAuthController::class, 'viewCashiers'])->name('cashier');
    Route::middleware(['auth:admin'])->patch('/cashier/{cashier}/activate', [AdminAuthController::class, 'updateCashierStatus'])->name('cashier.activate');
    
    // Admin Logout Route
    Route::post('logout', [AdminAuthController::class, 'logout'])->name('logout');
});

// Cashier Routes
Route::prefix('cashier')->name('cashier.')->group(function () {
    
    // Cashier Login and Registration Routes
    Route::get('login', [CashierAuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [CashierAuthController::class, 'login']);
    Route::get('register', [CashierAuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [CashierAuthController::class, 'register']);
    
    // Cashier Dashboard and Order Routes
    Route::middleware(['auth:cashier'])->get('/dashboard', [CashierAuthController::class, 'dashboard'])->name('dashboard');
    Route::middleware(['auth:cashier'])->post('/create-order', [CashierAuthController::class, 'createOrder'])->name('create-order');
    
    // Cashier Logout Route
    Route::post('logout', [CashierAuthController::class, 'logout'])->name('logout');
});
