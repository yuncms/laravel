<?php

use Illuminate\Http\Request;

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
Route::any('ping', 'HealthController@ping'); //心跳路由


Route::post('register', 'Api\User\RegisterController@basicRegister');//用户注册


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');



Route::post('login', 'Api\PassportController@login');



