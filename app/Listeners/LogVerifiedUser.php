<?php

namespace App\Listeners;

use App\Badge;
use App\Notifications\GotNewBadge;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class LogVerifiedUser
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        //
        $voterBadge = Badge::where('name',"Verified User")->get()->first();

        DB::table('badge_user')->insert(
            array(
                'badge_id'     =>   $voterBadge->id,
                'user_id'   =>  auth()->user()->id
            )
        );

        auth()->user()->notify(new GotNewBadge($voterBadge, auth()->user()));

    }
}
