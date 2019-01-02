<?php

namespace App\Http\Controllers\Server;

use App\Http\Controllers\ApiBaseController;
use App\model\AESModel;
use Illuminate\Http\Request;

class AESController extends ApiBaseController
{
    public $method=[
        'AES-128-ECB',
        'AES-192-ECB',
        'AES-256-ECB'
    ];

    public function choseMethod($pwd)
    {
        $partten='/\d/';

        preg_match($partten,md5($pwd),$res);

        return $this->method[current(array_flatten($res))%3];
    }

    public function choseTable($pwd)
    {
        $partten='/\d/';

        preg_match($partten,md5($pwd),$res);

        return current(array_flatten($res))%3;
    }

    public function salt()
    {
        return str_random(10);
    }

    public function encode(Request $request)
    {
        $pwd=$request->input('pwd');

        if (is_string($pwd) && $pwd!='')
        {
            $method=$this->choseMethod($pwd);

            $key=$this->salt();

            $encode=openssl_encrypt($pwd,$method,$key,OPENSSL_RAW_DATA);

            $encode=bin2hex($encode);

            $suffix=$this->choseTable($encode);

            AESModel::suffix($suffix);

            AESModel::updateOrCreate(['decode'=>$encode,'key'=>$key],[

                'encode'=>$pwd

            ]);

            return json_encode(['before_encode'=>$pwd,'after_encode'=>$encode,'decode_key'=>$key]);

        }else
        {
            return 'argv format like [ pwd => password for encode ]';
        }
    }

    public function decode(Request $request)
    {
        $pwd=$request->input('pwd');
        $key=$request->input('key');

        if (is_string($pwd) && $pwd!='' && is_string($key) && $key!='')
        {
            $suffix=$this->choseTable($pwd);

            AESModel::suffix($suffix);

            //$method从数据库取
            $res=AESModel::where(['decode'=>$pwd,'key'=>$key])->first();

            if (empty($res) || $res=='')
            {
                return "we dont have this code and key";
            }

            $pack=pack("H*",$pwd);

            $method=$this->choseMethod($res->encode);

            return json_encode(openssl_decrypt($pack,$method,$key,OPENSSL_RAW_DATA));

        }else
        {
            return 'argv format like [ pwd => password for decode , key => key for decode ]';
        }
    }





}
