<?php

namespace App\Listeners;

use App\Events\CasesDeleteEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Storage;

class CasesDeleteListener
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
     * @param  CasesDeleteEvent  $event
     * @return void
     */
    public function handle(CasesDeleteEvent $event)
    {
        //
        if($event->cases->pic!=""){
            Storage::delete($event->cases->pic);
        }
    }
}
