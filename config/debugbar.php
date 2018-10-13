<?php
return [
    'debugbar' => [
        'enabled'      => get_env('app.debug'),
        'storage'      => [
            'enabled'    => true,
            'driver'     => 'file',  // file, pdo, redis
            'path'       => storage('debugbar'),
            'connection' => null,
        ],
        'capture_ajax' => true,
        'collectors'   => [
            'phpinfo'    => true,  // Php version
            'messages'   => true,  // Messages
            'time'       => true,  // Time Datalogger
            'memory'     => true,  // Memory usage
            'exceptions' => false,  // Exception displayer
            'route'      => true,
            'request'    => true,  // Request logger
        ],
    ],
];