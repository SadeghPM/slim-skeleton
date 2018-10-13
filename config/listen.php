<?php
return [
    'listen' => [
        \App\Events\UserHasRegisteredEvent::class => [
            \App\Listeners\SendWelcomingEmail::class,
        ],
    ],
];