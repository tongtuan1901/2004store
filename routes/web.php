<?php


  use App\Http\Controllers\client\home;

use Illuminate\Support\Facades\Route;


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
use App\Http\Controllers\Admin\AdminOrdersController;
use App\Http\Controllers\Admin\AdminBannersController;
use App\Http\Controllers\Admin\AdminCouponsController;
use App\Http\Controllers\Admin\AdminProductsController;

use App\Http\Controllers\admin\AdminInventoryController;

use App\Http\Controllers\Admin\AdminCategoriesController;
use App\Http\Controllers\AdminUserController as ControllersAdminUserController;

Route::resource('admin-products', AdminProductsController::class);
// Danh mục
Route::resource('admin-categories', AdminCategoriesController::class);

// View client
Route::resource('/', HomeController::class);
Route::resource('client-user', UsersController::class);
Route::resource('client-categories', ClientCategories::class);
Route::resource('client-login', LoginController::class);
Route::resource('client-register', RegisterController::class);
Route::resource('client-products', ProductsController::class);
Route::resource('client-news',  NewsController::class);
Route::resource('client-card',  CardController::class);

Route::resource('admin-customers', AdminUserController::class);

Route::get('/users', [AdminUserController::class, 'index'])->name('users.index');
Route::get('/users/create', [AdminUserController::class, 'create'])->name('users.create');
Route::post('/users', [AdminUserController::class, 'store'])->name('users.store');
Route::get('/users/{user}/edit', [AdminUserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [AdminUserController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [AdminUserController::class, 'destroy'])->name('users.destroy');
Route::get('/users/{id}/restore', [AdminUserController::class, 'restore'])->name('users.restore');


// Danh mục
Route::resource('admin-categories', AdminCategoriesController::class);
// Mã giảm giá
// Định nghĩa resource cho admin-coupons
Route::resource('admin-coupons', AdminCouponsController::class);

// Route để lấy sản phẩm theo danh mục
Route::get('admin-coupons/products/{categoryId}', [AdminCouponsController::class, 'getProductsByCategory']);
  
// Đặt hàng
Route::resource('admin-orders', AdminOrdersController::class);
// Route quản lý tồn kho
Route::resource('inventory', AdminInventoryController::class);




Route::resource('admin-products', AdminProductsController::class);


Route::resource('admin-banners',AdminBannersController::class);

Route::get('Admin/Banners/trash',[AdminBannersController::class,'trash']);

Route::post('Admin/Banners/delete/{id}',[AdminBannersController::class,'delete']);

Route::get('/new', [AdminNewsController::class, 'index'])->name('new.index');
Route::get('/new/create', [AdminNewsController::class, 'create'])->name('new.create');
Route::get('/new/{id}/edit', [AdminNewsController::class, 'edit'])->name('new.edit');
Route::post('/new/store', [AdminNewsController::class, 'store'])->name('new.store');
Route::put('/new/{id}/update', [AdminNewsController::class, 'update'])->name('new.update');
Route::delete('/new/{id}', [AdminNewsController::class, 'destroy'])->name('new.destroy');
Route::get('/new/show/{id}',[AdminNewsController::class,'show'])->name('new.show');

