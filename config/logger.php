<?php
return array(
    'logger'=>[
        'name' => get_env('app.name'),
        'path' => __DIR__.'/../storage/logs/app.log',
        'level' => Monolog\Logger::DEBUG,
    ]
);