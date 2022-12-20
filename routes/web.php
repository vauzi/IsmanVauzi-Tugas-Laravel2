<?php

use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\BlogController;
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

// start route frontend from backEnd
Route::get('/', function () {
    return view('frontend.index');
})->name('/');
Route::get('/bloges/create', function () {
    return view('frontend.add');
})->name('add');
Route::get('/bloges/edit/{id}', function ($id) {
    return view('frontend.updateBlogs', ['id' => $id]);
});


Route::get('frontend/product', function () {
    return view('frontend.productIndex');
})->name('frontend.product');
Route::get('frontend/product/create', function () {
    return view('frontend.createProduct');
})->name('frontend.createProduct');
Route::get('frontend/product/update/{id}', function ($id) {
    return view('frontend.updateProduct', ['id' => $id]);
})->name('frontend.updateProduct');
// end route frontend from backEnd

Route::get('/upload.upload', [UploadController::class, 'index']);
Route::any('/upload', [UploadController::class, 'store'])->name('user.upload');

Route::get('product', [ProductController::class, 'index'])->name('product');
Route::get('product.create', [ProductController::class, 'create'])->name('product.create');
Route::post('product', [ProductController::class, 'store'])->name('product.store');
Route::get('product.show/{id}', [ProductController::class, 'show'])->name('product.show');
Route::get('product.edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::put('product.update/{id}', [ProductController::class, 'update'])->name('product.update');
Route::get('product.delete/{id}', [ProductController::class, 'destroy'])->name('product.delete');


Route::prefix('blog')->name('blog.')->controller(BlogController::class)->group(function () {
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
