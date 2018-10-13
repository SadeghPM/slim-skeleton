<?php

namespace App\Kernel\ServiceProvider;

use App\Kernel\Kernel;
use DebugBar\Bridge\MonologCollector;
use DebugBar\DataCollector\PDO\PDOCollector;
use DebugBar\DataCollector\PDO\TraceablePDO;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class DebugbarServiceProvider implements ServiceProviderInterface
{
    /**
     * Registers services on the given container.
     *
     * This method should only be used to configure services and parameters.
     * It should not get services.
     *
     * @param Container $container
     *
     * @throws \DebugBar\DebugBarException
     */
    public function register(Container $container)
    {
        if (\config('app.debug')) {
            $provider = new \Kitchenu\Debugbar\ServiceProvider(\config('debugbar'));
            $provider->register(Kernel::getApp());
            /** @var \DebugBar\DebugBar $debugbar */
            $debugbar = dependency('debugbar');

//            $env = new TraceableTwigEnvironment(dependency('view')->getEnvironment());
//            $debugbar->addCollector(new TwigCollector($env));
            $debugbar->addCollector(new MonologCollector(dependency('logger')));
            $collector = new TraceablePDO(dependency('db')->getDatabaseManager()->getPdo());
            $debugbar->addCollector(new PDOCollector($collector));
            $debugbar->addCollector(new \DebugBar\DataCollector\ConfigCollector(Kernel::getConfig()->all()));
        }
    }
}