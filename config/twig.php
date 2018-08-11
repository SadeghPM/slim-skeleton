<?php
return array(
    'twig' => [
        'template_path' => realpath(__DIR__.'/../resources/views'),
        'cache' => get_env('twig.cache') ? realpath(__DIR__."/../storage/framework/cache/twig") : false,
    ],
);