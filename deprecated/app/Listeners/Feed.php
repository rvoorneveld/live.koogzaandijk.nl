<?php

namespace App\Listeners;

use App\Events\MessageApproved;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class Feed
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
     * @param  MessageApproved  $event
     * @return void
     */
    public function handle(MessageApproved $event)
    {
        //dd('The message '.$event->message->message_title.' has registered. Fire off an event.');
    }
}
