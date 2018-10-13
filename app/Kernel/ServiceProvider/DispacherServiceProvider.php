<?php

namespace App\Kernel\ServiceProvider;

use Illuminate\Events\Dispatcher;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class DispacherServiceProvider implements ServiceProviderInterface
{
    /**
     * Registers Dispatcher
     *
     * @param Container $pimple A container instance
     */
    public function register(Container $pimple)
    {
        $dispatcher = new Dispatcher();
        foreach (config('listen') as $event => $listeners) {
            foreach ($listeners as $listener) {
                $dispatcher->listen([$event], $listener);
            }
        }

        $pimple['dispatcher'] = function ($c) use ($dispatcher) {
            return $dispatcher;
        };
    }
}