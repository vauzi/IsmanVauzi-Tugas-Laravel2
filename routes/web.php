<?php

use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\user\UploadController;
use Illuminate\Support\Facades\Route;

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

Route::get('/upload.upload', [UploadController::class, 'index']);
Route::any('/upload', [UploadController::class, 'store'])->name('user.upload');

Route::get('product', [ProductController::class, 'index'])->name('product');
Route::get('product.create', [ProductController::class, 'create'])->name('product.create');
Route::post('product', [ProductController::class, 'store'])->name('product.store');
Route::get('product.show/{id}', [ProductController::class, 'show'])->name('product.show');
Route::get('product.edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::put('product.update/{id}', [ProductController::class, 'update'])->name('product.update');
Route::get('product.delete/{id}', [ProductController::class, 'destroy'])->name('product.delete');
