<?php
//add twig
container()['view'] = function ($c) {
    $view = new \Slim\Views\Twig(
        config('twig.template_path'),
        ['cache' => config('twig.cache')]
    );
    // Instantiate and add Slim specific extension
    $basePath = rtrim(
        str_ireplace('index.php', '', dependency('request')->getUri()->getBasePath()),
        '/'
    );
    $view->addExtension(new \Slim\Views\TwigExtension($c['router'], $basePath));
    $view->addExtension(new \App\Kernel\Dependency\CsrfTwigExtention(dependency('csrf')));
    $view->getEnvironment()->addFunction(new Twig_Function('asset', 'asset'));
    $view->getEnvironment()->addFunction(new Twig_Function('config', 'config'));
    $view->getEnvironment()->addFunction(new Twig_Function('route', 'route'));
    $view->getEnvironment()->addFunction(new Twig_Function('input', 'input'));
    $view->getEnvironment()->addFunction(new Twig_Function('dd', 'dd'));
    $view->getEnvironment()->addFunction(new Twig_Function('dump', 'dump'));
    $view->getEnvironment()->addFunction(new Twig_Function('table', 'table'));
    $view->getEnvironment()->addFunction(new Twig_Function('csrf', 'csrf'));

    return $view;
};