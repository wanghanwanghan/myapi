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

//查ip归属地
Route::match(['post','get'],'/ip', 'Server\\IpController@show');

//查手机归属地
Route::match(['post','get'],'/phone', 'Server\\PhoneController@show');

//加密
Route::match(['post','get'],'/encode','Server\\AESController@encode');

//解密
Route::match(['post','get'],'/decode','Server\\AESController@decode');

//兜底路由
Route::fallback(function (){

    return 'no match routes';

});

