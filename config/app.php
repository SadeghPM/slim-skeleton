<?php
return array(
    'app' => [
        'name'                   => get_env('app.name', 'slim-app'),
        'debug'                  => get_env('app.debug', true),
        'displayErrorDetails'    => get_env('app.debug', true), // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header
        'timezone'               => get_env('app.timezone', 'Asia/Tehran'),
        'locale'                 => get_env('app.locale', 'en'),
        'fallback_locale'        => get_env('app.fallback_locale', 'en'),
        'url'                    => get_env('app.url', 'http://localhost'),
    ],
);