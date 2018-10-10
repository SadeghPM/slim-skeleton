<?php

namespace Tests\Component;

use App\Kernel\Util\Cache;
use Tests\BaseTestCase;

class CacheTest extends BaseTestCase
{
    public function testSetAndGetCacheItem()
    {
        /** @var Cache $cache */
        $cache = dependency(Cache::class);
        $key = uniqid('key');
        $value = uniqid('value');
        $this->assertNotTrue($cache->has($key));
        $this->assertEquals($cache->put($key, $value), $value);
        $this->assertEquals($cache->get($key), $value);
        $this->assertEquals($cache->pull($key), $value);
        $this->assertNotTrue($cache->has($key));
    }
}