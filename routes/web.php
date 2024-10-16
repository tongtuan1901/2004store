<?php


  use App\Http\Controllers\client\home;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminCategoriesController;
use App\Http\Controllers\Admin\AdminProductsController;
use App\Http\Controllers\client\CardController;
use App\Http\Controllers\client\ClientCategories;
use App\Http\Controllers\client\HomeController;
use App\Http\Controllers\client\LoginController;
use App\Http\Controllers\client\NewsController;
use App\Http\Controllers\client\ProductsController;
use App\Http\Controllers\client\RegisterController;
use App\Http\Controllers\client\UsersController;

use App\Http\Controllers\Admin\AdminProductsController;
use App\Http\Controllers\Admin\AdminBannersController;
use App\Http\Controllers\AdminCouponsController;
use App\Http\Controllers\Admin\AdminCategoriesController;

use App\Http\Controllers\admin\NewsController;
use Illuminate\Support\Facades\Route;





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
// Mã giảm giá
Route::resource('admin-coupons', AdminCouponsController::class);
// Đặt hàng
Route::resource('admin-orders', AdminOrdersController::class);





Route::resource('admin-products', AdminProductsController::class);


Route::resource('admin-banners',AdminBannersController::class);

Route::get('Admin/Banners/trash',[AdminBannersController::class,'trash']);

Route::post('Admin/Banners/delete/{id}',[AdminBannersController::class,'delete']);

Route::get('/new', [NewsController::class, 'index'])->name('new.index');
Route::get('/new/create', [NewsController::class, 'create'])->name('new.create');
Route::get('/new/{id}/edit', [NewsController::class, 'edit'])->name('new.edit');
Route::post('/new/store', [NewsController::class, 'store'])->name('new.store');
Route::put('/new/{id}/update', [NewsController::class, 'update'])->name('new.update');
Route::delete('/new/{id}', [NewsController::class, 'destroy'])->name('new.destroy');
Route::get('/new/show/{id}',[NewsController::class,'show'])->name('new.show');

