<?php





use App\Http\Controllers\client\home;



use App\Http\Controllers\AdminOrdersController;

use App\Http\Controllers\AdminCouponsController;
use App\Http\Controllers\Admin\AdminCategoriesController;

use App\Http\Controllers\Admin\AdminBannersController;
use App\Http\Controllers\Admin\AdminProductsController;
use Illuminate\Support\Facades\Route;




Route::resource('admin-products', AdminProductsController::class);


// Danh mục
Route::resource('admin-categories', AdminCategoriesController::class);
// Mã giảm giá
Route::resource('admin-coupons', AdminCouponsController::class);
// Đặt hàng
Route::resource('admin-orders', AdminOrdersController::class);


Route::resource('admin-banners',AdminBannersController::class);


