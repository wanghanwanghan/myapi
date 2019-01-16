<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function GetPicture()
    {
        $str=file_get_contents('http://www.58pic.com/piccate/17-280-0.html');

        $ptn='/<img\s+src=(.*)>/U';

        preg_match_all($ptn,$str,$res);

        foreach ($res[1] as $row)
        {
            echo iconv('gbk','utf-8',$row);
            echo "\n";
        }



    }

    public function index()
    {
        return view('welcome');
    }

    //将接口图片下载至本地
    private function imageDownload($url)
    {
        $filename = '';
        if (strlen($url) ===0 || file_get_contents($url)=='')
        {
            return;
        }

        $date = date('Y-m-d');
        $basePath = 'uploads/reportImage';
        $targetPath = $basePath . '/' . $date . '/';
        if (!is_dir($targetPath))
        {
            mkdir($targetPath, 0777, true);
            chmod($targetPath, 0777);
        }

        $this->Del_File_By_Ctime($basePath, 10);
        $filename = $targetPath . date("His") . rand(0, 999) . ".jpg";
        //用天月面时分秒来命名新的文件名
        ob_start(); //打开输出
        if(false != @readfile($url))
        {
            //输出图片文件
            $img = ob_get_contents(); //得到浏览器输出
            ob_end_clean(); //清除输出并关闭
            $size = strlen($img); //得到图片大小
            $fp2 = @fopen($filename, "a");
            fwrite($fp2, $img); //向当前目录写入图片文件，并重新命名
            fclose($fp2);
        }

        return $filename;
    }

    private function Del_File_By_Ctime($dir, $n)
    {
        if (is_dir($dir))
        {

        }

        if ($dh = opendir($dir))
        {

        }

        while (false !== ($file = readdir($dh)))
        {
            if ($file != "." && $file != "..")
            {
                $fullpath = $dir . "/" . $file;

                if (is_dir($fullpath))
                {
                    if (count(scandir($fullpath)) == 2 && $file != date('Y-m-d'))
                    {
                        //目录为空,=2是因为.和..存在
                        rmdir($fullpath); // 删除空目录
                    } else
                    {
                        $this->Del_File_By_Ctime($fullpath, $n); //不为空继续判断文件夹中文件
                    }
                } else
                {
                    $filedate = filemtime($fullpath); //获取文件创建时间
                    $minutes = round((time() - $filedate) / 60); //计算已创建分钟，进行四舍五入
                    if ($minutes > $n) unlink($fullpath); //删除过期文件
                }
            }
        }

        closedir($dh);

    }

    //检查文件是否存在
    private function existLogoFile($file) {
        if ($file) {
            $fileDir = LOGO_FILE_DIR . $file;
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $fileDir);
            curl_setopt($ch, CURLOPT_NOBODY, 1); // 不下载
            curl_setopt($ch, CURLOPT_FAILONERROR, 1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            if (curl_exec($ch) !== false)
                return 1;
            else
                return 0;
        }else {
            return 0;
        }
    }













}
