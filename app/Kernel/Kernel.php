<?php

namespace App\Kernel;

use Noodlehaus\Config;
use Slim\App;

class Kernel
{
    /**
     * @var Config
     */
    private static $env;

    /**
     * @var Config
     */
    private static $config;
    /**
     * @var App
     */
    private static $app;

    public function __construct()
    {
        self::$env = Config::load(__DIR__."/../../env.yaml");
        require "helper.php";
        self::$config = Config::load(__DIR__."/../../config");

    }

    /**
     * @return Config
     */
    public static function getEnv(): Config
    {
        return self::$env;
    }

    /**
     * @return Config
     */
    public static function getConfig(): Config
    {
        return self::$config;
    }

    /**
     * @return App
     */
    public static function getApp(): App
    {
        return self::$app;
    }

    /**
     * Boot slim application
     * @return App
     */
    public function boot()
    {
        session_start();
        date_default_timezone_set(config('app.timezone'));
        self::$app = new App(['settings' => \config('app')]);
        require "dependency.php";
        $this->loadUserDependency();

        return self::$app;
    }

    public function loadUserDependency()
    {
        require __DIR__."/../Dependency/dependency.php";
        require __DIR__."/../Middleware/middleware.php";
        require __DIR__."/../../routes/web.php";
        require __DIR__."/../../routes/api.php";
    }
}