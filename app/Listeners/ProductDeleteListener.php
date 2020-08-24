<?php

namespace App\Listeners;

use App\Events\ProductDeleteEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Storage;

class ProductDeleteListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ProductDeleteEvent  $event
     * @return void
     */
    public function handle(ProductDeleteEvent $event)
    {
        //
        if($event->product->pic!=""){
            Storage::delete($event->product->pic);
        }
    }
}
