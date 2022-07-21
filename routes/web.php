<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->name('admin.')->group(function () {
        Route::controller(ProductController::class)->prefix('product/')->name('product.')->group(function () {
            Route::get('', 'index')->name('index');

            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::post('update/{id}', 'update')->name('update');
        
            Route::get('destroy/{id}', 'destroy')->name('destroy');
        });

        Route::controller(CategoryController::class)->prefix('categories/')->name('categories.')->group(function () {
            Route::get('', 'index')->name('index');

            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::post('update/{id}', 'update')->name('update');
        
            Route::get('destroy/{id}', 'destroy')->name('destroy');
        });

        Route::controller(UserController::class)->prefix('user/')->name('user.')->group(function () {
            Route::get('', 'index')->name('index');

            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::post('update/{id}', 'update')->name('update');
        
            Route::get('destroy/{id}', 'destroy')->name('destroy');
        });
});
