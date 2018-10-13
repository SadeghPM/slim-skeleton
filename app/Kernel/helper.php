<?php

if (!function_exists('get_env')) {
    /**
     * get app environment config
     *
     * @param      $name
     * @param null $default
     *
     * @return mixed|null
     */
    function get_env($name, $default = null)
    {
        return \App\Kernel\Kernel::getEnv()->get($name, $default);
    }
}

if (!function_exists('config')) {
    /**
     * Gets a configuration setting using a simple or nested key. Nested keys are similar to JSON paths that use the dot dot notation.
     *
     * @param      $key
     * @param null $default
     *
     * @return mixed|null
     */
    function config($key, $default = null)
    {
        return \App\Kernel\Kernel::getConfig()->get($key, $default);
    }
}

if (!function_exists('app')) {
    /**
     * @return \Slim\App
     */
    function app()
    {
        return \App\Kernel\Kernel::getApp();
    }
}

if (!function_exists('container')) {

    /**
     * Enable access to the DI container by consumers of $app
     *
     * @return \Psr\Container\ContainerInterface
     */
    function container()
    {
        return app()->getContainer();
    }
}

if (!function_exists('dependency')) {

    /**
     * Finds an entry of the container by its identifier and returns it.
     *
     * @param $name
     *
     * @return mixed
     * @throws \Psr\Container\NotFoundExceptionInterface
     * @throws \Psr\Container\ContainerExceptionInterface
     */
    function dependency($name)
    {
        return container()->get($name);
    }
}

if (!function_exists('route')) {

    /**
     * Build the path for a named route including the base path
     *
     * @param       $name
     * @param array $data
     * @param array $queryParams
     *
     * @return string
     * @throws RuntimeException
     * @throws InvalidArgumentException
     */
    function route($name, $data = [], $queryParams = [])
    {
        /** @var \Slim\Router $route */
        $route = dependency('router');

        return config('app.url').$route->pathFor($name, $data, $queryParams);
    }
}

if (!function_exists('asset')) {

    /**
     * Get asset full path
     *
     * @param $file
     *
     * @return string
     */
    function asset($file)
    {
        return config('app.url')."/".$file;
    }
}

if (!function_exists('input')) {

    /**
     * Fetch parameter value from query string or retrieve any parameters provided in the request body.
     *
     * @param null $key
     * @param null $default
     *
     * @return array|mixed
     */
    function input($key, $default = null)
    {
        /** @var \Slim\Http\Request $request */
        $request = dependency('request');
        $inputs = array_merge($request->getQueryParams() ?? [], $request->getParsedBody() ?? []);

        return isset($inputs[$key]) ? $inputs[$key] : $default;
    }
}

if (!function_exists('view')) {

    /**
     * Output rendered template
     *
     * @param \Psr\Http\Message\ResponseInterface $response
     * @param                                     $template
     * @param array                               $data
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    function view(\Psr\Http\Message\ResponseInterface $response, $template, $data = [])
    {
        /** @var \Slim\Views\Twig $view */
        $view = dependency('view');

        return $view->render($response, $template, $data);
    }
}

if (!function_exists('logger')) {

    /**
     * Get logger instance
     *
     * @return \Monolog\Logger
     */
    function logger()
    {
        return dependency('logger');
    }
}

if (!function_exists('table')) {

    /**
     * Begin a fluent query against a database table.
     *
     * @param $name
     *
     * @return \Illuminate\Database\Query\Builder
     */
    function table($name)
    {
        /** @var \Illuminate\Database\Capsule\Manager $database */
        $database = dependency('db');

        return $database->getDatabaseManager()->table($name);
    }
}

if (!function_exists('csrf')) {

    /**
     * output csrf name and value as input string to use in forms.
     *
     */
    function csrf()
    {
        /** @var \Slim\Csrf\Guard $csrf */
        $csrf = dependency('csrf');
        $nameKey = $csrf->getTokenNameKey();
        $valueKey = $csrf->getTokenValueKey();
        $name = $csrf->getTokenName();
        $value = $csrf->getTokenValue();

        $inputs
            = <<<CSRF_INPUT
            <input type="hidden" name="$nameKey" value="$name">
            <input type="hidden" name="$valueKey" value="$value">
CSRF_INPUT;

        return trim($inputs);
    }
}

if (!function_exists('storage')) {

    /**
     * get storage path.
     *
     * @param null $path
     *
     * @return string
     */
    function storage($path = null)
    {
        $storage = rootPath("storage");

        return $path ? $storage."/".$path : $storage;
    }
}

if (!function_exists('resource')) {

    /**
     * get resource path.
     *
     * @param null $path
     *
     * @return string
     */
    function resource($path = null)
    {
        $resource = rootPath("resources");

        return $path ? $resource."/".$path : $resource;
    }
}

if (!function_exists('rootPath')) {

    /**
     * get root path.
     *
     * @param null $path
     *
     * @return string
     */
    function rootPath($path = null)
    {
        $root = __DIR__."/../..";

        return realpath($path ? $root."/".$path : $root);
    }
}

if (!function_exists('runCommand')) {


    /**
     * Helper to run a sub-command from a command.
     *
     * @param string                                                 $command Command that should be run.
     * @param \Symfony\Component\Console\Output\OutputInterface|null $output  The output to use. If not provided, the output will be silenced.
     *
     * @return int 0 if everything went fine, or an error code
     */
    function runCommand($command, $output = null)
    {
        /** @var \Silly\Application $silly */
        $silly = dependency(\Silly\Application::class);

        return $silly->runCommand($command, $output);
    }
}

if (!function_exists('trans')) {

    /**
     * Get the translation for a given key.
     *
     * @param  string $key
     * @param  array  $replace
     * @param  string $locale
     *
     * @return string|array|null
     */
    function trans($key, array $replace = [], $locale = null)
    {
        /** @var \Illuminate\Translation\Translator $translator */
        $translator = dependency(Illuminate\Translation\Translator::class);

        return $translator->get($key, $replace, $locale);
    }
}

if (!function_exists('__')) {

    /**
     * Get the translation for a given key.
     *
     * @param  string $key
     * @param  array  $replace
     * @param  string $locale
     *
     * @return string|array|null
     */
    function __($key, array $replace = [], $locale = null)
    {
        return trans($key, $replace, $locale);
    }
}

if (!function_exists('validator')) {

    /**
     * Create a new Validator instance.
     *
     * See full documentation on https://laravel.com/docs/5.5/validation
     *
     * @param  array $data
     * @param  array $rules
     * @param  array $messages
     * @param  array $customAttributes
     *
     * @return \Illuminate\Validation\Validator
     */
    function validator(array $data, array $rules, array $messages = [], array $customAttributes = [])
    {
        /** @var \Illuminate\Validation\Factory $validator */
        $validator = dependency('validator');

        return $validator->make($data, $rules, $messages, $customAttributes);
    }
}

if (!function_exists('debugbarMessage')) {

    /**
     * Add data to debugbar message section
     *
     * @param $data
     *
     * @return mixed|boolean
     */
    function debugbarMessage($data)
    {
        if (config('app.debug')) {
            /** @var \DebugBar\DebugBar $debugbar */
            $debugbar = dependency('debugbar');

            return $debugbar['messages']->addMessage($data);
        }

        return false;
    }
}

if (!function_exists('fireEvent')) {

    /**
     * Fire an event and call the listeners.
     *
     * @param  string|object $event
     * @param  mixed         $payload
     * @param  bool          $halt
     *
     * @return array|null
     */
    function fireEvent($event, $payload = [], $halt = false)
    {
        /** @var \Illuminate\Events\Dispatcher $dispatcher */
        $dispatcher = dependency('dispatcher');

        return $dispatcher->fire($event, $payload, $halt);
    }
}