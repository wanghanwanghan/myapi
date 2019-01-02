<?php

namespace App\Http\Controllers\Server;

use App\Http\Controllers\ApiBaseController;
use App\model\IpModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class IpController extends ApiBaseController
{
    public function show(Request $request)
    {
        $argv=$request->all();

        //含不含有ip
        if (!isset($argv['ip']))
        {
            return 'argv format like [ ip => 127.0.0.1 ]';
        }

        //ip格式对不对
        if (!RegexController::checkIpFormat($argv['ip']))
        {
            return 'ip address is incorrect';
        }

        $url=Config::get('define.SelectIpUrl').'?';
        $agv='ip='.$argv['ip'].'&'.'dtype=json&key='.Config::get('define.SelectIpKey');

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
        $ip2long=ip2long($argv['ip']);
        $suffix=$ip2long%3;

        IpModel::suffix($suffix);

        IpModel::updateOrCreate(['ip2long'=>$ip2long],[

            //要更新的
            'ip'=>$argv['ip'],
            'result'=>$res

        ]);

        return $res;
    }
}
