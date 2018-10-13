<?php

namespace App\Events;


class UserHasRegisteredEvent
{
    /**
     * @var array
     */
    public $user;

    public function __construct(array $user)
    {
        $this->user = $user;
        logger()->info('Event fired: '.UserHasRegisteredEvent::class);
    }
}