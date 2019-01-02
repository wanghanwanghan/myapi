<?php

namespace App\Http\Controllers\Server;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;

class RegexController extends Controller
{
    public static function checkIpFormat($ip)
    {
        $partten=Config::get('regex.check_ip_addr');

        if (preg_match($partten,$ip))
        {
            return true;
        }else
        {
            return false;
        }
    }

    public static function checkPhoneFormat($phone)
    {
        $partten=Config::get('regex.check_phone');

        if (preg_match($partten,$phone))
        {
            return true;
        }else
        {
            return false;
        }
    }
}
