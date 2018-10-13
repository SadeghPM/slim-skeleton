<?php
if (config('app.debug')) {

    container()['phpErrorHandler'] = function ($c) {
        /** @var \Monolog\Logger $logger */
        $logger = dependency('logger');
        $whoopsHandler = new \Dopesong\Slim\Error\Whoops();

        $whoopsHandler->pushHandler(
            function ($exception) use ($logger) {
                /** @var \Exception $exception */
                $logger->error(
                    $exception->getMessage(),
                    ['exception' => $exception]
                );

                return \Whoops\Handler\Handler::DONE;
            }
        );

        return $whoopsHandler;
    };
    container()['errorHandler'] = function ($container) {
        return new \App\Kernel\Util\Error(dependency('phpErrorHandler'));
    };
} else {
    container()['phpErrorHandler'] = container()['errorHandler'] = function () {
        return new \App\Kernel\View\PhpError();
    };
}
container()['notFoundHandler'] = function () {
    return new \App\Kernel\View\NotFound();
};
container()['notAllowedHandler'] = function () {
    return new \App\Kernel\View\MethodNotAllowed();
};