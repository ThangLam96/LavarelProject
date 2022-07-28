<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CkeditorController extends Controller
{
    public function upload (Request $request) 
    {
        //upload file image
        $imageName = time(). '-' . $request->upload->getClientOriginalName();
        $request->upload->move(public_path('ckeditor'), $imageName);

        $CKeditorFuncNum = $request-input('CKeditorFuncNum');
        $url = asset('ckeditor/'.$imageName);
        $msg = 'Image successfully uploaded';
        $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKeditorFuncNum, '$url', '$msg')</script>";

        @header('Content-type: text/html; charset=utf-8');
        echo $re;
    }
}
