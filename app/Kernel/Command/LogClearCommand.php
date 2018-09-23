<?php

namespace App\Kernel\Command;

use Symfony\Component\Console\Style\SymfonyStyle;

class LogClearCommand
{
    public function __invoke(SymfonyStyle $style)
    {
        $logDir = storage("logs");

        if (file_exists($logDir) and !$this->isDirEmpty($logDir)) {
            $style->progressStart();

            shell_exec("rm -R $logDir/*");
            $style->text('Log cleared!');
        } else {
            $style->text('Log already cleared!');
        }
        file_put_contents($logDir."/app.log",null);
        $style->text('');
    }

    private function isDirEmpty($dir)
    {
        if (!is_readable($dir)) {
            return null;
        }

        return (count(scandir($dir)) == 2);
    }
}