<?php
return [
    'command' => [
        'user' => [
            'hello [name]' => new \App\Command\HelloWorldCommand(),
        ],
        'core' => [
            'serve'              => new \App\Kernel\Command\RunServerCommand(),
            'twig:clear'         => new \App\Kernel\Command\TwigCacheClearCommand(),
            'log:clear'          => new \App\Kernel\Command\LogClearCommand(),
            'app:clear'          => new \App\Kernel\Command\AppClearCommand(),
            'make:model [model]' => new \App\Kernel\Command\MakeModelCommand(),
            'shell'              => new \App\Kernel\Command\PsyShellCommand(),
            'storage:link'       => new \App\Kernel\Command\SymLinkCommand(),
        ],
    ],
];