## Laravel like slim skeleton
if you worked in laravel then the skeleton structure is familiar to you.skeleton using slimframework and twig for template engine, monolog for logger, Laravel Eloquent for database interactions and laravel mix for js/css operations.

### Quick start
+ installation : `composer create-project sadegh-pm/slim-skeleton [my-app-name]`
+ copy `env.example.yaml` to `env.yaml` and fill detail
+ start server: `composer start`
+ test: `composer test`
+ asset(js/sass) compilation: `npm dev` or `npm prod` for production build. see package.json for more options.

### file and directory structure
+ `app`:
    + `Controller`: your app controllers
    + `Dependency/dependency.php`: define your app dependency
    + `Middleware/middleware.php`: define your app middleware
    + `Kernel`: app startup process including twig,logger,database,error-handlers dependency and helpers
+ `config`: configuration files, define your config file and then access their with `config` helper
+ `public`: public directory
+ `resources`: app resource directory include js,sass and twig files
+ `routes`:
    + `web.php` define app routes
    + `api.php` define api routes
+ `storage`:
    `app` use for upload and other purpose
    `framework`: used for framework usage like twig cache directory
    `log/log.app`: app log file
+ `tests`: test directory
+ `env.yaml` environment configuration file

### Helpers
skeleton comes with some helpers. For more information see `app/Kernel/helper.php`:
+ `route($name,$params)` in php and twig Build the path for a named route including the base path
+ `config($key,$default)` in php and twig Gets a configuration setting using a simple or nested key. Nested keys are similar to JSON paths that use the dot dot notation.
+ `asset($file)` in php and twig get resource url
+ `input($key,$default)` in php and twig Fetch parameter value from query string or retrieve any parameters provided in the request body
+ `table($tableName)` in php and twig Begin a fluent query against a database table using eloquent query builder

### Test
The `tests/Functional` include sample tests.phpunit used for testing. Define your functional test in this directory.

use `composer test` for run tests.
