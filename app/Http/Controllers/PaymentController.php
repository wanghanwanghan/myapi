<?php

namespace App\Http\Controllers;

use Endroid\QrCode\QrCode;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function payByAlipay()
    {
        $no=str_random(16);

        return app('alipay')->web([
            'out_trade_no' => $no, // 订单编号，需保证在商户端不重复
            'total_amount' => 199, // 订单金额，单位元，支持小数点后两位
            'subject'      => '支付 Laravel Shop 的订单：'.$no, // 订单标题
        ]);
    }

    //前端回调
    public function alipayReturn()
    {
        $data = app('alipay')->verify();
        dd($data);
    }

    //服务器回调
    public function alipayNotify()
    {
        $data = app('alipay')->verify();
        \Log::debug('Alipay notify', $data->all());
    }

    public function payByWechatpay()
    {
        $qr=new QrCode('你是我闺女，盖章，签字，生效！');

        return response($qr->writeString(), 200, ['Content-Type' => $qr->getContentType()]);
    }



}
