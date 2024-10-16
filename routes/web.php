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
use App\Http\Controllers\Admin\AdminCategoriesController;
use App\Http\Controllers\Admin\AdminCouponsController;
use App\Http\Controllers\Admin\AdminOrdersController;
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
//View Admin
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
