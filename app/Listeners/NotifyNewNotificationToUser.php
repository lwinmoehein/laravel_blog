<?php

namespace App\Listeners;

use Illuminate\Auth\Events\NewNotificationCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyNewNotificationToUser
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
     * @param  NewNotificationCreated  $event
     * @return void
     */
    public function handle(NewNotificationCreated $event)
    {
        //
    }
}
