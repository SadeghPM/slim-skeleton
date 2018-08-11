<?php
require __DIR__.'/../vendor/autoload.php';

$kernel = new \App\Kernel\Kernel();
$kernel->boot()->run();