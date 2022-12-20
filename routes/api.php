<?php

use App\Http\Controllers\backEnd\BlogsController;
use App\Http\Controllers\backEnd\PenggunaController;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('bloges', [BlogsController::class, 'index']);
Route::get('bloges/{id}', [BlogsController::class, 'show']);
Route::post('bloges', [BlogsController::class, 'store']);
Route::post('bloges/{id}', [BlogsController::class, 'update']);
Route::POST('bloges/delete/{id}', [BlogsController::class, 'destroy']);
// Route::post('bloges/store', [BlogsController::class, 'store']);
// Route::resource('bloges', BlogsController::class)->except(['create', 'edit']);
