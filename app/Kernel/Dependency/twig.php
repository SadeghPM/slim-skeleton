<?php
if (config('app.debug')) {
    container()['twig_profile'] = function () {
        return new Twig_Profiler_Profile();
    };
}
//add twig
container()['view'] = function ($c) {
    $view = new \Slim\Views\Twig(
        config('twig.template_path'),
        ['cache' => config('twig.cache')]
    );
    $view->addExtension(new \Slim\Views\TwigExtension(dependency('router'), config('app.url')));
    $view->addExtension(new \App\Kernel\ServiceProvider\CsrfTwigExtention(dependency('csrf')));
    $view->getEnvironment()->addFunction(new Twig_Function('asset', 'asset'));
    $view->getEnvironment()->addFunction(new Twig_Function('config', 'config'));
    $view->getEnvironment()->addFunction(new Twig_Function('route', 'route'));
    $view->getEnvironment()->addFunction(new Twig_Function('input', 'input'));
    $view->getEnvironment()->addFunction(new Twig_Function('dd', 'dd'));
    $view->getEnvironment()->addFunction(new Twig_Function('dump', 'dump'));
    $view->getEnvironment()->addFunction(new Twig_Function('table', 'table'));
    $view->getEnvironment()->addFunction(new Twig_Function('csrf', 'csrf'));
    $view->getEnvironment()->addFunction(new Twig_Function('__', '__'));
    $view->getEnvironment()->addFunction(new Twig_Function('trans', 'trans'));

    if (config('app.debug')) {
        $view->addExtension(new Twig_Extension_Profiler(dependency('twig_profile')));
        $view->addExtension(new Twig_Extension_Debug());
    }

    return $view;
};
