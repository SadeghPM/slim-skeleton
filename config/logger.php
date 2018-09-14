<?php
return array(
    'logger' => [
        'name' => get_env('app.name'),
        'path' => storage('logs/app.log'),
        'level' => Monolog\Logger::DEBUG,
    ],
);