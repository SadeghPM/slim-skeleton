<?php

namespace App\Kernel\Command;

use Silly\Application;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class AppClearCommand
{
    public function __invoke(SymfonyStyle $style,OutputInterface $output)
    {
        $style->text('clearing...');
        runCommand('twig:clear',$output);
        runCommand('log:clear',$output);
    }

    private function isDirEmpty($dir)
    {
        if (!is_readable($dir)) {
            return null;
        }

        return (count(scandir($dir)) == 2);
    }
}