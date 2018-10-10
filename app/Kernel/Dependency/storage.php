<?php
container()[\League\Flysystem\Filesystem::class] = function ($c) {
    $adapter = new \League\Flysystem\Adapter\Local(storage('app/public'));
    $filesystem = new \League\Flysystem\Filesystem($adapter);

    return $filesystem;
};