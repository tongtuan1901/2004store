<?php

use App\Http\Controllers\admin\AdminBrandsController;
use App\Http\Controllers\Admin\AdminCategoriesController;
use App\Http\Controllers\admin\AdminColorsController;
use App\Http\Controllers\Admin\AdminProductsController;
use App\Http\Controllers\admin\AdminSizesController;
use Illuminate\Support\Facades\Route;

Route::resource('admin-products', AdminProductsController::class);
// danh mục admin
Route::resource('admin-categories', AdminCategoriesController::class);
// thuonghw hiệu
Route::resource('admin-brands', AdminBrandsController::class);
//color
Route::resource('admin-color', AdminColorsController::class);
//size
Route::resource('admin-size', AdminSizesController::class);
