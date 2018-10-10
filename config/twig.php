<?php
return array(
    'twig' => [
        'template_path' => resource('views'),
        'cache' => get_env('cache.twig') ? storage("framework/cache/twig") : false,
    ],
);