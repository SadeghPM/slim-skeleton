<?php
return array(
    'twig' => [
        'template_path' => resource('views'),
        'cache' => get_env('twig.cache') ? storage("framework/cache/twig") : false,
    ],
);