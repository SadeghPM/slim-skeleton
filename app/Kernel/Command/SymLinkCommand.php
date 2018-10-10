<?php

namespace App\Kernel\Command;

use Symfony\Component\Console\Style\SymfonyStyle;

class SymLinkCommand
{
    const THEME_SEM_LINK = "ln -s %s %s";

    public function __invoke(SymfonyStyle $style)
    {
        $style->section('creating theme path symlink...');

        $symlink = rootPath()."/public/storage";
        $storagePath = storage('app/public');
        $style->note('Public storage path is :'.$storagePath);
        $style->note('symlink is :'.$symlink);
        if (file_exists($symlink)) {
            $style->note('symlink exist :'.$symlink);

            return;
        }
        shell_exec(sprintf(self::THEME_SEM_LINK, $storagePath, $symlink));
        $style->text('Done.');
    }
}