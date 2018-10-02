<?php

namespace App\Kernel\Command;


use Psy\Shell;
use Symfony\Component\Console\Style\SymfonyStyle;

class PsyShellCommand
{
    public function __invoke(SymfonyStyle $style)
    {
        $style->note(config('app.name')." shell.");
        $psy = new Shell();
        $psy->run();
    }

}