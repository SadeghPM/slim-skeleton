<?php

namespace App\Kernel\ServiceProvider;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class SillyServiceProvider implements ServiceProviderInterface
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
        $pimple[\Silly\Application::class] = function ($c) {
            $silly = new \Silly\Application(config('app.name'));
            $silly->useContainer($c, true, true);
            foreach (config('command.core') as $command => $handler) {
                $silly->command($command, $handler);
            }
            foreach (config('command.user') as $command => $handler) {
                $silly->command($command, $handler);
            }

            return $silly;
        };
    }
}