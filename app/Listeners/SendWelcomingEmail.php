<?php

namespace App\Listeners;


use App\Events\UserHasRegisteredEvent;

class SendWelcomingEmail
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
     */
    public function handle(UserHasRegisteredEvent $event)
    {
        // Access the user using $event->user
        logger()->info('Sending email to '.$event->user['email']);
    }
}