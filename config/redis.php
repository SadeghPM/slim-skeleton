<?php
return array(
    'redis' => [
        'host' => get_env('redis.host', '127.0.0.1'),
        'port' => get_env('redis.port', 6379),
    ],
);