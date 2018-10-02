<?php
return [
    'command' => [
        'user' => [
            'hello [name]' => new \App\Command\HelloWorldCommand(),
        ],
        'core' => [
            'twig:clear' => new \App\Kernel\Command\TwigCacheClearCommand(),
            'log:clear' => new \App\Kernel\Command\LogClearCommand(),
            'app:clear' => new \App\Kernel\Command\AppClearCommand(),
            'make:model [model]' => new \App\Kernel\Command\MakeModelCommand(),
            'shell' => new \App\Kernel\Command\PsyShellCommand(),
        ],
    ],
];