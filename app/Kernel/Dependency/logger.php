<?php
// add monolog
container()['logger'] = function ($c) {
    $logger = new Monolog\Logger(config('logger.name'));
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(
        new Monolog\Handler\StreamHandler(config('logger.path'), config('logger.level'))
    );

    return $logger;
};