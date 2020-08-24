<?php

namespace App;

use App\Events\CasesDeleteEvent;
use Illuminate\Database\Eloquent\Model;

class Cases extends Model
{
    //
    protected $dispatchesEvents =[
        'deleted'=> CasesDeleteEvent::class,//删除时触发事件
    ];
}
