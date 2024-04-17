<?php

namespace App\Listeners;

use App\Events\UserAddedEvent;
use App\Jobs\SendUserAddedEmailJob;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UserAddedListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserAddedEvent $event)
    {
        SendUserAddedEmailJob::dispatch($event->user);
    }
}
