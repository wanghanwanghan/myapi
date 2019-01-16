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
Route::group(['namespace'=>'Server'],function (){

    Route::match(['post','get'],'/ip', 'IpController@show');

    Route::match(['post','get'],'/phone', 'PhoneController@show');

    Route::match(['post','get'],'/encode','AESController@encode');

    Route::match(['post','get'],'/decode','AESController@decode');

});


//兜底路由
Route::fallback(function (){

    return 'no match routes';

});

