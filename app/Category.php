<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //获取分类数据
    public static function getCates()
    {
        $cates = self::orderBy('sort','desc')->orderBy('id','desc')->get();
        $cates = self::makeCates($cates);
        return $cates;
    }

    //组织无限极分类数据
    private static function makeCates($data, $pid = 0, $level = 0)
    {
        $arr = array();
        foreach ($data as $datum){
            if ($datum->pid == $pid){

                $datum->level = $level;
                $arr[] = $datum;
                $temp_arr = self::makeCates($data,$datum->id,$level+1);
                $arr = array_merge($arr,$temp_arr);

            }
        }

        return $arr;
    }

    public static function getChildsById($id = 0)
    {
        if (!$id){
            return array();
        }

        $ids[] =$id;
        $data = self::all();
        $childs =  self::makeCates($data,$id);
        foreach ($childs as $item){
            $ids[] =$item->id;
        }
        return $ids;

    }
}
