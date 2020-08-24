<?php

namespace App;

use App\Events\ProductDeleteEvent;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $dispatchesEvents =[
        'deleted'=> ProductDeleteEvent::class,//删除时触发事件
    ];


    //反向 一对多
    public function category()
    {
        return $this->belongsTo('App\Category','cid');
    }

}
