<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('login', 'LoginController@login');
Route::post('verify', 'LoginController@verify');

Route::get('categories', 'CategoryController@getAllActiveCategories');
Route::get('products', 'ProductController@getAllActiveProducts');
Route::get('specials', 'ProductController@speicals');
Route::get('news', 'ProductController@news');


Route::group(['middleware' => ['auth:sanctum']] ,function () {
    Route::apiResource('cart', 'CartController');
});