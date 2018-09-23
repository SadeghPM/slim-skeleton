<?php

namespace App\Kernel\ServiceProvider;

use Illuminate\Events\Dispatcher;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class DatabaseService implements ServiceProviderInterface
{
    /**
     * Registers eloquent ino container and bootup
     *
     * This method should only be used to configure services and parameters.
     * It should not get services.
     *
     * @param Container $pimple A container instance
     */
    public function register(Container $pimple)
    {
        $capsule = new \Illuminate\Database\Capsule\Manager;
        $capsule->addConnection(config('database'));

        $capsule->setAsGlobal();
        $capsule->setEventDispatcher(new Dispatcher());
        $capsule->bootEloquent();

        if (config('app.debug')) {
            $capsule::connection()->enableQueryLog();
        }

        $pimple['db'] = function ($c) use ($capsule) {
            return $capsule;
        };
    }
}