<?php

namespace App\Providers;

use App\Jobs\SendUserAddedEmailJob;
 
use App\Providers\NewUserAddedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NewUserAddedListener
{

    /**
     * Handle the event.
     */
    public function handle(NewUserAddedEvent $event): void
    {
        NewUserAddedEvent::dispatch($event);
    }
}
