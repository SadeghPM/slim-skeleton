<?php

container()[\Cache\Adapter\Redis\RedisCachePool::class] = function ($c) {
    $client = new \Redis();
    $client->connect(config('redis.host'), config('redis.port'));
    $pool = new \Cache\Adapter\Redis\RedisCachePool($client);

    return New \Cache\Namespaced\NamespacedCachePool(
        $pool,
        md5(config('app.key'))
    );
};

container()[\Cache\Adapter\Filesystem\FilesystemCachePool::class] = function ($c) {
    $filesystemAdapter = new \League\Flysystem\Adapter\Local(storage('framework'));
    $filesystem = new \League\Flysystem\Filesystem($filesystemAdapter);

    return new \Cache\Adapter\Filesystem\FilesystemCachePool($filesystem);
};

container()[\App\Kernel\Util\Cache::class] = function ($c) {
    if (config('cache.driver') === 'redis') {
        $namespacesPool = dependency(
            \Cache\Adapter\Redis\RedisCachePool::class
        );
    } else {
        $namespacesPool = dependency(\Cache\Adapter\Filesystem\FilesystemCachePool::class);
    }

    return new \App\Kernel\Util\Cache($namespacesPool);
};
