<?php

namespace App\Listeners;

use App\Notifications\GotNewAchievement;
use App\Notifications\GotNewBadge;
use Illuminate\Auth\Events\BadgeReceived;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogAndNotifyReceivedBadge
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
     * @param  BadgeReceived  $event
     * @return void
     */
    public function handle(BadgeReceived $event)
    {
        auth()->user()->notify(new GotNewBadge($event->badge, auth()->user()));
    }
}
