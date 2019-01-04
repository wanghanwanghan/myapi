<?php

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

Route::get('/','Controller@index');

Route::get('/pay','PaymentController@payByAlipay')->name('test_alipay');
Route::get('/payment/alipay/return', 'PaymentController@alipayReturn')->name('payment.alipay.return');
Route::post('/payment/alipay/notify', 'PaymentController@alipayNotify')->name('payment.alipay.notify');

Route::get('/pay_wechar','PaymentController@payByWechatpay')->name('pay_wechar');





//兜底路由
Route::fallback(function () {

    return 'no match routes';

});
