<?php

use App\Http\Controllers\Admin\AdminBannersController;
use App\Http\Controllers\Admin\AdminProductsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is~ where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::resource('admin-products', AdminProductsController::class);

Route::resource('admin-banners',AdminBannersController::class);

Route::get('Admin/Banners/trash',[AdminBannersController::class,'trash']);

Route::post('Admin/Banners/delete/{id}',[AdminBannersController::class,'delete']);

