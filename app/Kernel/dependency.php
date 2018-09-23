<?php
include "Dependency/csrf.php";
include "Dependency/logger.php";
include "Dependency/error.php";
include "Dependency/twig.php";

container()->register(new \App\Kernel\ServiceProvider\DatabaseService());
container()->register(new \App\Kernel\ServiceProvider\SillyServiceProvider());

if (config('app.debug')) {
    app()->add(new \RunTracy\Middlewares\TracyMiddleware(app()));
}
