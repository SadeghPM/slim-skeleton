<?php

namespace App\Kernel\Command;

use Silly\Application;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class RunServerCommand
{

    const RUN = "php -S localhost:8000 -t %s";

    public function __invoke(SymfonyStyle $style,OutputInterface $output)
    {
        $style->writeln('Server started at http://localhost:8000');
        shell_exec(sprintf(self::RUN,rootPath('public')));
    }
}