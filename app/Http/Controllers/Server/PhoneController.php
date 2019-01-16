<?php

namespace App\Http\Controllers\Server;

use App\Http\Controllers\ApiBaseController;
use App\model\PhoneModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class PhoneController extends ApiBaseController
{
    public function show(Request $request)
    {
        $argv=$request->all();

        //含不含有ip
        if (!isset($argv['phone']))
        {
            return 'argv format like [ phone => 13800138000 ]';
        }

        //ip格式对不对
        if (!RegexController::checkPhoneFormat($argv['phone']))
        {
            return 'Phone number is incorrect';
        }

        $url=Config::get('define.SelectPhoneUrl').'?';
        $agv='phone='.$argv['phone'].'&'.'dtype=json&key='.Config::get('define.SelectPhoneKey');

        //请求聚合接口
        $res=file_get_contents($url.$agv);

        $result=json_decode($res,true);

        if (!isset($result['resultcode']) || !$result['resultcode']==200)
        {
            return 'result error';
        }

        if (!isset($result['error_code']) || !$result['error_code']==0)
        {
            return 'result error';
        }

        //把查询结果写入mysql
        $suffix=$argv['phone']%3;

        PhoneModel::suffix($suffix);

        PhoneModel::updateOrCreate(['phone'=>$argv['phone']],[

            //要更新的
            'result'=>$res

        ]);

        return $res;
    }
}
