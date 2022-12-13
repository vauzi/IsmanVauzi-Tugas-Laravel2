<?php

use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\user\UploadController;
use App\Http\Controllers\user\UserBlogController;
use App\Http\Controllers\user\UserProductController;
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

Route::get('product', [ProductController::class, 'index'])->name('product')->middleware('withAuth');
Route::get('product.create', [ProductController::class, 'create'])->name('product.create')->middleware('withAuth');
Route::post('product', [ProductController::class, 'store'])->name('product.store')->middleware('withAuth');
Route::get('product.show/{id}', [ProductController::class, 'show'])->name('product.show')->middleware('withAuth');
Route::get('product.edit/{id}', [ProductController::class, 'edit'])->name('product.edit')->middleware('withAuth');
Route::put('product.update/{id}', [ProductController::class, 'update'])->name('product.update')->middleware('withAuth');
Route::get('product.delete/{id}', [ProductController::class, 'destroy'])->name('product.delete')->middleware('withAuth');


Route::middleware('withAuth')->prefix('blog')->name('blog.')->controller(BlogController::class)->group(function () {
    Route::get('/', 'index')->name('blog');
    Route::get('/create', 'create')->name('create');
    Route::get('/show/{id}', 'show')->name('show');
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::get('/delete/{id}', 'destroy')->name('delete');

    Route::put('/update/{id}', 'update')->name('update');
    Route::post('/store', 'store')->name('store');
});

Route::prefix('user')->name('user.')->group(function () {
    Route::get('/product', [UserProductController::class, 'index'])->name('product');
    Route::get('/product/{id}', [UserProductController::class, 'show'])->name('product-show');

    Route::get('/blog', [UserBlogController::class, 'index'])->name('blog');
    Route::get('/blog/{id}', [UserBlogController::class, 'readMore'])->name('readMore');
});

Route::any('/login', [AuthController::class, 'login'])->name('login');
Route::any('logout', [AuthController::class, 'logout'])->name('logout')->middleware('withAuth');
