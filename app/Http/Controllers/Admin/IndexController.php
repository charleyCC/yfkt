<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function index()
    {
//        return asset(__ADMIN__);
        return view('admin.index.index');
    }

    //图片上传接口
    public function imgupload(Request $request)
    {
        $info = array(
            'code' => 200,
            'url' => ''
        );

        if ($request->file('file')){
            $info['url'] = '/storage/uploads/'.$request->file('file')->store('news/editor');
        }else{
            $info['code'] = 400;
        }

        return json_encode($info);
    }
}
