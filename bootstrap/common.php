<?php
/**
 * Created by PhpStorm.
 * User: charley chan
 * Date: 2020/8/22 0022
 * Time: 下午 9:22
 * 公共函数，全局使用，需要在app.php中引入
 */

function checkReturn($res,$msg = '操作')
{
    if ($res){
        session()->flash('data',array('class'=>'success','msg'=>$msg.'成功'));
    }else{
        session()->flash('data',array('class'=>'danger','msg'=>$msg.'失败'));
    }
}