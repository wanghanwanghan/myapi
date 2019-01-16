<?php

namespace App\Http\Controllers\Server;

use App\Http\Controllers\ApiBaseController;
use Illuminate\Http\Request;

class PictureController extends ApiBaseController
{
    public function upload(Request $request)
    {
        $fp=$request->file('pic')->getPath();
        $fn=$request->file('pic')->getFilename();

        ob_start();

        readfile($fp.DIRECTORY_SEPARATOR.$fn);

        $img=ob_get_contents();

        ob_end_clean();

        file_put_contents(storage_path(str_random().'.jpg'),$img);

    }
}
