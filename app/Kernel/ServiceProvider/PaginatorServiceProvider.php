<?php

namespace App\Kernel\ServiceProvider;

use App\Kernel\Util\PaginatorTwigView;
use Illuminate\Pagination\Paginator;
use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Slim\Http\Request;

class PaginatorServiceProvider implements ServiceProviderInterface
{
    /**
     * Registers services on the given container.
     *
     * This method should only be used to configure services and parameters.
     * It should not get services.
     *
     * @param Container $container
     */
    public function register(Container $container)
    {
        Paginator::$defaultView = "paginator/default.twig";
        Paginator::$defaultSimpleView = "paginator/simple.default.twig";

        Paginator::viewFactoryResolver(
            function () {
                return new PaginatorTwigView();
            }
        );
        Paginator::currentPathResolver(
            function () {
                /** @var Request $request */
                $request = dependency('request');

                return config('app.url').$request->getUri()->getPath();
            }
        );

        Paginator::currentPageResolver(
            function ($pageName = 'page') {
                $page = input($pageName);

                if (filter_var($page, FILTER_VALIDATE_INT) !== false && (int)$page >= 1) {
                    return (int)$page;
                }

                return 1;
            }
        );
    }
}