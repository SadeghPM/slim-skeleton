<?php
include __DIR__."/Dependency/csrf.php";
include __DIR__."/Dependency/logger.php";
include __DIR__."/Dependency/error.php";
include __DIR__."/Dependency/twig.php";
include __DIR__."/Dependency/cache.php";
include __DIR__."/Dependency/storage.php";
include __DIR__."/Dependency/validator.php";

container()->register(new \App\Kernel\ServiceProvider\DatabaseService());
container()->register(new \App\Kernel\ServiceProvider\PaginatorServiceProvider());
container()->register(new \App\Kernel\ServiceProvider\SillyServiceProvider());
container()->register(new \App\Kernel\ServiceProvider\TranslationService());
container()->register(new \App\Kernel\ServiceProvider\DebugbarServiceProvider());
container()->register(new \App\Kernel\ServiceProvider\DispacherServiceProvider());
