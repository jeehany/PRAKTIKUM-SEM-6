<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/products/pdf', [ProductController::class, 'exportPdf'])->name('products.pdf');
    Route::resource('products', ProductController::class);
    Route::get('/categories/print', [CategoryController::class, 'print'])->name('categories.print');
    Route::resource('categories', CategoryController::class);
    Route::resource('units', UnitController::class);
    Route::get('/customers/print', [CustomerController::class, 'print'])->name('customers.print');
    Route::resource('customers', CustomerController::class);
    Route::get('/users/print', [UserController::class, 'print'])->name('users.print');
});
Route::get('/users/export-excel', [UserController::class, 'exportExcel'])->name('users.exportExcel');
Route::resource('users', UserController::class)->middleware(['auth']);

require __DIR__ . '/auth.php';
