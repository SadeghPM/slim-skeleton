<?php
/**
 * Created by PhpStorm.
 * User: sadeghpm
 * Date: 9/19/18
 * Time: 10:32 PM
 */

namespace App\Kernel\Command;


use Symfony\Component\Console\Style\SymfonyStyle;

class TwigCacheClearCommand
{
    public function __invoke(SymfonyStyle $style)
    {
        $cacheDir = storage("framework/cache/twig");

        if (file_exists($cacheDir) and !$this->isDirEmpty($cacheDir)) {
            $style->progressStart();

            shell_exec("rm -R $cacheDir/*");
            $style->text('Twig cache cleared!');
        } else {
            $style->text('Twig cache already cleared!');
        }
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