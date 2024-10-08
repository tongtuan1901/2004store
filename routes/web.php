<?php

use App\Http\Controllers\AdminCategoriesController; // Sửa ở đây
use App\Http\Controllers\AdminCouponsController;
use App\Http\Controllers\AdminProductsController;
use App\Http\Controllers\AdminCouponsControllerController;
use App\Http\Controllers\AdminOrdersController;

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
// Mã giảm giá
Route::resource('admin-coupons', AdminCouponsController::class);
// Đặt hàng
Route::resource('admin-orders', AdminOrdersController::class);
