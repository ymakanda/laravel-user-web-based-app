<?php

namespace App\Providers;

use App\Events\UserAddedEvent;
use function Illuminate\Events\queueable;
use Illuminate\Support\Facades\Event;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Throwable;

class NewUserAddedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Register any other events for your application.
     */
    public function boot(): void
    {
        // Event::listen(queueable(function (UserAddedEvent $event) {
        //     // ...
        // })->onConnection('sync')->onQueue('podcasts')->delay(now()->addSeconds(10)));

        Event::listen(queueable(function (UserAddedEvent $event) {
            // ...
        })->catch(function (UserAddedEvent $event, Throwable $e) {
            // The queued listener failed...
        }));
    }


    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
