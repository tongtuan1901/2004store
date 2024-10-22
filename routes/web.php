<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;


use App\Http\Controllers\client\CardController;
use App\Http\Controllers\client\HomeController;
use App\Http\Controllers\client\NewsController;
use App\Http\Controllers\client\LoginController;
use App\Http\Controllers\client\UsersController;
use App\Http\Controllers\client\ClientCategories;
use App\Http\Controllers\admin\AdminNewsController;
use App\Http\Controllers\Admin\AdminUserController;



use App\Http\Controllers\client\ProductsController;
use App\Http\Controllers\client\RegisterController;
use App\Http\Controllers\admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminOrdersController;
use App\Http\Controllers\Admin\AdminBannersController;
use App\Http\Controllers\Admin\AdminCouponsController;
use App\Http\Controllers\Admin\AdminProductsController;
use App\Http\Controllers\admin\AdminInventoryController;
use App\Http\Controllers\Admin\AdminUserStaffController;
use App\Http\Controllers\Admin\AdminCategoriesController;
use App\Http\Controllers\Admin\AdminStatisticsController;





   
// quản lí admin và nhân viên
Route::prefix('admin')->group(function () {
    Route::resource('user-staff', AdminUserStaffController::class)->middleware('admin'); // Thêm middleware vào đây

    // Đăng nhập admin và nhân viên
    Route::get('login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [AdminLoginController::class, 'login'])->name('admin.login.submit');
    Route::post('logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

 // Mã giảm giá
 Route::resource('admin-coupons', AdminCouponsController::class);
    
 // Sản phẩm
 Route::resource('admin-products', AdminProductsController::class);
 
 // Danh mục
 Route::resource('admin-categories', AdminCategoriesController::class);
 
 // Khách hàng
 Route::resource('admin-customers', AdminUserController::class);
 
 // Banner
 Route::resource('admin-banners', AdminBannersController::class);
 
 // Đặt hàng
 Route::resource('admin-orders', AdminOrdersController::class);
 
 // Thống kê
 Route::get('/admin/statistics', [AdminStatisticsController::class, 'index'])->name('admin.statistics');
 
 // Route cho tin tức
 Route::resource('new', AdminNewsController::class);

 Route::resource('users', AdminUserController::class);
 //
 Route::resource('inventory', AdminInventoryController::class);

});


    // dang nhap admin và nhân viên

// Route cho view client
Route::resource('/', HomeController::class);
Route::resource('client-user', UsersController::class);
Route::resource('client-categories', ClientCategories::class);
Route::resource('client-login', LoginController::class);
Route::resource('client-register', RegisterController::class);
Route::resource('client-products', ProductsController::class);
Route::resource('client-news', NewsController::class);
Route::resource('client-card', CardController::class);
