<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConfigController extends Controller
{
    //获取配置数据
    private function getConfig($name = 'siteconfig')
    {
        $config_result = DB::table('config')->where('name','=',$name)->first();

        $config = array();
        if ($config_result){
            $config = json_decode($config_result->config,true);
        }

        return $config;
    }
    //站点配置页面
    public function siteconfig()
    {
        $config = $this->getConfig('siteconfig');
        return view('admin.config.siteconfig')->with('config',$config);
    }

    //基本信息配置页面
    public function informationconfig()
    {
        $config = $this->getConfig('informationconfig');
        return view('admin.config.informationconfig')->with('config',$config);
    }

    //百度推送配置页面
    public function baiduconfig()
    {
        $config = $this->getConfig('baiduconfig');
        return view('admin.config.baiduconfig')->with('config',$config);
    }

    //配置信息入库
    public function store(Request $request)
    {

        //数据验证
        $this->checkData($request->name,$request);

        $data = $request->only(['name','title']);
        $datas = json_encode($request->except(['name','title','_token']));

        $data['config'] = $datas;
        $data['created_at'] = date('Y/m/d H:i:s',time());
        $data['updated_at'] = date('Y/m/d H:i:s',time());

        //查询是否存在记录，是就更新，否就插入
        $select_result = DB::table('config')->where('name','=',$request->name)->first();
        if ($select_result){
            $result = DB::table('config')->where('name','=',$request->name)->update($data);
        }else{
            $result = DB::table('config')->insert($data);
        }

        if ($result === true || $result > 0){
            //闪存数据
            session()->flash('data',array('class'=>'success','msg'=>'更新成功'));

        }else{
            session()->flash('data',array('class'=>'danger','msg'=>'更新失败'));
        }
        return redirect(route('admin.config.'.$request->name));

    }

    //数据验证
    private function checkData
    ($name = 'siteconfig',$request)
    {
        switch ($name){
            case 'informationconfig' :

                $request->validate(array(
                    'company' => 'required',
                    'address' => 'required',
                    'phone' => 'required',
                    'copyright' => 'required',
                ),array(
                    'company.required' => '公司名称不能为空',
                    'address.required' => '公司地址不能为空',
                    'phone.required' => '客服热线不能为空',
                    'copyright.required' => '备案号不能为空',
                ));
                break;

            case 'baiduconfig' :

                $request->validate(array(
                    'baidu_key' => 'required',
                ),array(
                    'baidu_key.required' => '秘钥不能为空',
                ));
                break;

            default :

                $request->validate(array(
                    'name' => 'required',
                    'title' => 'required',
                    'domain' => 'required|url',
                    'sitetitle' => 'required',
                ),array(
                    'name.required' => '配置标识不能为空',
                    'title.required' => '配置名称不能为空',
                    'domain.required' => '网站域名不能为空',
                    'domain.url' => '网站域名格式不正确',
                    'sitetitle.required' => '网站名称不能为空',
                ));
        }
    }
}
