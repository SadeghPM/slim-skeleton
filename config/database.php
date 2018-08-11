<?php
return array(
    'database' => [
        'driver' => get_env('database.driver', 'mysql'),
        'host' => get_env('database.host', 'localhost'),
        'database' => get_env('database.database', 'slim'),
        'username' => get_env('database.username', 'root'),
        'password' => get_env('database.password', ''),
        'charset' => get_env('database.charset', 'utf8'),
        'collation' => get_env('database.collation', 'utf8_unicode_ci'),
        'prefix' => '',
    ],
);