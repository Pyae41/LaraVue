<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\HomeController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:api')->namespace('App\Http\Controllers')->group(function () {

    // category crud
    Route::resource('category', \Api\CategoryController::class);

    // item crud
    Route::resource('item', \Api\ItemController::class);

    Route::post('logout', [AuthController::class, 'logout']);
});

// client

Route::prefix('client')->group(function () {
    Route::get('/getCategories', [HomeController::class, 'getCategories'])->name('home.getCategories');
    Route::get('/getItems', [HomeController::class, 'getItems'])->name('home.getItems');

    Route::get('/product/detail/{id}',[HomeController::class,'productDetail'])->name('home.productDetail');
    Route::get('/products/{name}',[HomeController::class,'getByCategory'])->name('home.getByCategory');

    Route::post('filter',[HomeController::class,'filterItems'])->name('home.filter');
    Route::post('search',[HomeController::class,'searchItemByName'])->name('home.search');
});
