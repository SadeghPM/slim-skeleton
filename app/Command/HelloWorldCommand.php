<?php

namespace App\Command;

use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class HelloWorldCommand
{
    public function __invoke($name, LoggerInterface $logger, SymfonyStyle $style)
    {
        $logger->info('hello world from command ...');
        $style->text('Hello ;)'.$name);
    }
}