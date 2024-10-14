<?php

use App\Http\Controllers\Admin\AdminCategoriesController;
use App\Http\Controllers\Admin\AdminProductsController;
use App\Http\Controllers\Admin\NewsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::resource('admin-products', AdminProductsController::class);
Route::resource('admin-customers', UserController::class);

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
Route::get('/users/{id}/restore', [UserController::class, 'restore'])->name('users.restore');

// Danh mục
Route::resource('admin-categories', AdminCategoriesController::class);

//
Route::get('/new', [NewsController::class, 'index'])->name('new.index');
Route::get('/new/create', [NewsController::class, 'create'])->name('new.create');
Route::get('/new/{id}/edit', [NewsController::class, 'edit'])->name('new.edit');
Route::post('/new/store', [NewsController::class, 'store'])->name('new.store');
Route::put('/new/{id}/update', [NewsController::class, 'update'])->name('new.update');
Route::delete('/new/{id}', [NewsController::class, 'destroy'])->name('new.destroy');