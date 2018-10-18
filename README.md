## What is Slim-skeleton
Slim micro framework has popular and simple basic PHP framework and is amazing to develop web applications with more performance, clean, simple and optimized, on other way Laravel framework
has configured and very powerful feature like template engine, Eloquent for database interactions, cli, events and etc, and that's amazing too,
so slim skeleton configured and structured in slim base with some Laravel features and structure,
skeleton using slimframework for base and twig for template engine, monolog for logger, Laravel Eloquent for database interactions, laravel mix for js/css operations and etc.  
If you worked with Laravel, then the skeleton structure is familiar to you.  

## Installation and quick start
##### Server Requirements  
- PHP >= 7.0.0
- PDO PHP Extension

##### Installing Slim-skeleton
It's recommended that you use Composer to install Slim-skeleton.
 So, before using Skeleton, make sure you have [Composer](https://getcomposer.org) installed on your machine.
``` bash
$ composer create-project sadegh-pm/slim-skeleton app-name
```

##### Quick start
+ Set database and other configuration at `env.yaml` in root of project
+ Install npm packages: `npm install` and compile asset(js/sass), `npm dev` or `npm prod` for production build. see package.json for more options. (You must installed [node js](https://nodejs.org) in your machine)
+ start server: `php cli serve` or `composer start`
+ test: `composer test`

## Files and directories structure
+ `app`:
    + `Command`: Define your custom command for cli 
    + `Controller`: Your app controllers
    + `Dependency/dependency.php`: Define your app dependency
    + `Events`: Your app events
    + `Kernel`: App startup process including twig,logger,database,error-handlers dependency and helpers
    + `Listeners`: Your app listener
    + `Middleware/middleware.php`: Define your app middleware
    + `Observers`: Your app Observers 
        + `register_observer.php`: Register app observers  
        
    <strong>App model define in root of app directory</strong>
+ `config`: Configuration files, define your config file and then access their with `config` helper
+ `public`: Public directory
+ `resources`: App resource directory
    + `js`: App js files
    + `lang`: App localization language directories and files
    + `sass`: App css files
    + `views`: App views directories and files
+ `routes`:
    + `web.php` Define app web routes
    + `api.php` Define app api routes
+ `storage`:
    + `app` Use for upload and other purpose
    + `framework`: Used for framework usage like twig cache directory
    + `log/app.log`: App log file
+ `tests`: Test directory
+ `env.yaml` Environment configuration file

## Local Development
If you need develop in local server you may use Skeleton core command or Composer command.
 This commands will start a development server at http://localhost:8000
``` bash
// Skeleton Command
$ php cli serve

// Composer Command
$ composer start
```

## Deploying to a shared hosts
- Coping all directories and files from public directory to public_html in your host
- Coping all other directories and files to one before directory of public_html
- Edit index.php in public_html and fix path for boot.php file (Maybe like "/../slim-skeleton/bootstrap/boot.php")
- Edit app url in env.yaml
- Visit your app url and every think must be ok

## Configuration Files
All of the configuration files are stored in the config directory.  
you may use the get_env helper to retrieve values from these variables in your configuration files <strong>but if you need value
in app or twig just use config helper like next section.</strong>
``` bash
'debug' => get_env('app.debug', true)
```
Accessing Configuration Values:  
You may easily access your configuration values using the global
 config helper function from anywhere in your application.
``` bash
$value = config('app.timezone');
```

## Cache
Skeleton use PSR-6 Cache and provides redis and file cache driver you can define in env.yaml.
 The cache configuration is located at `config/cache.php`.
 In this file you may specify which cache driver you would like to be used by default throughout your application.  
 
  You can see all cache method in `app/Kernel/Util/Cache.php` or in test file for cache in `tests/Component/CacheTest.php`

## Validation
Skeleton use Laravel validation and with validator helper you can use it for
validate request data. (You can see full documentation in [Laravel validation docs](https://laravel.com/docs/validation))  

You can see simple example for validation in `tests/Component/ValidatorTest.php`
  
## Command
The slim skeleton use [Silly CLI](https://github.com/mnapoli/silly) that just an implementation over the Symfony Console.
You can read the [Silly CLI documentation](https://github.com/mnapoli/silly) or [Symfony documentation](https://symfony.com/doc/current/components/console.html) to learn everything you can do with it.  
 
Command file of config directory has two sections command, For user custom command and skeleton core command. (HelloWorldCommand created for example)  
For define new custom command:
 - Add custom command class in `app/Command` directory
 - Define it in `config/command.php` in user section

 Core command:
 - php cli serve : Start a development server at http://localhost:8000 (You need to config database in env.yaml)
 - php cli twig:clear : Clear twig template cache
 - php cli log:clear : Clear skeleton log file stored in storage directory
 - php cli app:clear : Clear twig cache and skeleton log file
 - php cli make:model [model] : Create app model
 - php cli shell : Run [PsySH](https://github.com/bobthecow/psysh) that is a runtime developer console. (Maybe like tinker in laravel)
 - php cli storage:link : Link storage directory to public folder.
 
<strong>You can see core command file in `app/Kernel/Command` and use that for create custom command.</strong>
    
## Events
Events provides a simple observer implementation, allowing you to subscribe and listen for various events that occur in your application.
- Create Event classes in the `app/Events` directory
- Create their listeners in `app/Listeners`
- Register events in `config/listen.php`
- Use `fireEvent` helper for call events

## Localization
Localization features provide a convenient way to retrieve strings in various languages,
 allowing you to easily support multiple languages within your application.
 Language strings are stored in files within the `resources/lang` directory.
 Within this directory there should be a subdirectory for each language supported by the application and 
 all language files return an array of key value strings.  
 You can use `trans` or `__`(2 underscore) helpers in app and twig template for get value from local file.

## Helpers <a id="helper-section"></a>
Skeleton comes with some helpers. For more information see `app/Kernel/helper.php`:
+ `route($name,$params)`(#route-anchors) In php and twig Build the path for a named route including the base path
+ `config($key,$default)` In php and twig get a configuration setting using a simple or nested key. Nested keys are similar to JSON paths that use the dot dot notation.
+ `asset($file)` In php and twig get resource url
+ `input($key,$default)` In php and twig Fetch parameter value from query string or retrieve any parameters provided in the request body
+ `table($tableName)` In php and twig Begin a fluent query against a database table using eloquent query builder
+ `trans($key)` In php and twig get value from locale files

## Database
#### Eloquent ORM
Skeleton use Laravel eloquent and database system, For more information about eloquent you can see
[Laravel eloquent documentations](https://laravel.com/docs/5.7/eloquent), you can use
`table` helper for interacting with database too and for more information see [Laravel query builder documentations](https://laravel.com/docs/5.7/queries)

#### Observers
If you are listening for many events on model,
you may use observers to group all of your listeners into a single class.
Observers classes have method names which reflect the Eloquent events you wish to listen for.
Each of these methods receives the model as their only argument.
- Add observer class in `app/Observers`
- Register observer in `app/Observers/register_observer.php`

## Storage
Skeleton use powerful [filesystem](https://github.com/thephpleague/flysystem)
you can see more information in [Filesystem documentations](http://flysystem.thephpleague.com/docs/)
or refer to [Laravel file storage documentations](https://laravel.com/docs/5.7/filesystem).  
For access to storage file in public directory need to create symlink by below command:
``` bash
$ php cli storage:link
```

The below section is test for how to use storage (`tests/Component/StorageTest.php`)
```php
    public function testSaveFileOnStorage()
    {
        /** @var Filesystem $storage */
        $storage = dependency(Filesystem::class);
        $testFile = "test_file.txt";
        $content = uniqid('random_text');
        $creationStat = $storage->put($testFile, $content);
        $this->assertTrue($creationStat);
        $this->assertTrue($storage->get($testFile)->exists());
        $this->assertEquals($content, $storage->read($testFile));
        $this->assertTrue($storage->delete($testFile));
    }
```

## Twig
Skeleton use twig template engine that is a modern template engine for PHP and:  

<strong>Fast:</strong> Twig compiles templates down to plain optimized PHP code. The overhead compared to regular PHP code was reduced to the very minimum.  
  
<strong>Secure:</strong> Twig has a sandbox mode to evaluate untrusted template code. This allows Twig to be used as a template language for applications where users may modify the template design.  
  
<strong>Flexible:</strong> Twig is powered by a flexible lexer and parser. This allows the developer to define its own custom tags and filters, and create its own DSL.  
  
For more information about twig you can see [Twig page](https://twig.symfony.com/).  

- All templates located at `resources/views` directory.
- you can use all helpers in twig files.

## Test
The `tests/Functional` include sample tests.phpunit used for testing. Define your functional test in this directory.

use `composer test` for run tests.

## License
The Slim-skeleton framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
