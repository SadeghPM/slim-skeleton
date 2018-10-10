<?php
return array(
    'cache' => [
        'driver' => get_env('cache.driver','file'),
        'twig'   => get_env('cache.twig') ? storage('framework/cache/twig')
            : false,
        'ttl'    => get_env('cache.ttl', 60),//time to live in minute
    ],
);