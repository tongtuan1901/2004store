<?php

use App\Http\Controllers\AdminCategoriesController; // Sửa ở đây
use App\Http\Controllers\AdminProductsController;
use Illuminate\Support\Facades\Route;

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

// Danh mục
Route::resource('admin-categories', AdminCategoriesController::class);
