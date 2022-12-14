<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/users", "Api\UserController@index");
Route::get("/users/{user}", "Api\UserController@show");
Route::get("/users/{id}/dishes", "Api\UserController@dishesList");

Route::get("/categories", "Api\CategoriesController@index");

Route::get("/generate", "Api\OrderController@generateToken");
Route::post("/checkout", "Api\OrderController@makePayment");