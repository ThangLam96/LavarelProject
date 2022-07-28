<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CkeditorController;

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

Route::get('login', [LoginController::class, 'getLogin'])->name('getLogin');
Route::post('login', [LoginController::class, 'postLogin'])->name('postLogin');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::prefix('admin')->name('admin.')->group(function () {
        Route::post('ckeditor/upload', [CkeditorController::class, 'upload'])->name('upload');

        Route::controller(ProductController::class)->prefix('products/')->name('products.')->group(function () {
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

        Route::controller(UserController::class)->prefix('users/')->name('users.')->group(function () {
            Route::get('', 'index')->name('index');

            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::post('update/{id}', 'update')->name('update');
        
            Route::get('destroy/{id}', 'destroy')->name('destroy');
        });
});
