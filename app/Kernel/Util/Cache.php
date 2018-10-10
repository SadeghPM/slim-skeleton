<?php

namespace App\Kernel\Util;

use Psr\Cache\CacheItemPoolInterface;

class Cache
{
    /**
     * @var CacheItemPoolInterface
     */
    private $pool;

    public function __construct(CacheItemPoolInterface $pool)
    {
        $this->pool = $pool;
    }

    /**
     * retrieve an item from the cache or store it forever
     *
     * @param string   $key
     * @param callable $ifNotExist
     *
     * @return mixed
     * @throws \Psr\Cache\InvalidArgumentException
     */
    public function rememberForever(string $key, $ifNotExist)
    {
        return $this->remember($key, 0, $ifNotExist);
    }

    /**
     * retrieve an item from the cache,
     *
     * but also store a default value if the requested item doesn't exist
     *
     * @param string   $key
     * @param int      $minutes
     * @param callable $ifNotExist
     *
     * @return mixed
     * @throws \Psr\Cache\InvalidArgumentException
     */
    public function remember(string $key, int $minutes, $ifNotExist)
    {
        if ($this->has($key)) {
            return $this->get($key);
        } else {
            return $this->put($key, call_user_func($ifNotExist), $minutes);
        }
    }

    /**
     * @param string $key
     *
     * @return bool
     * @throws \Psr\Cache\InvalidArgumentException
     */
    public function has(string $key)
    {
        return $this->pool->hasItem($key);
    }

    /**
     * @param string $key
     * @param string $default
     *
     * @return mixed
     * @throws \Psr\Cache\InvalidArgumentException
     */
    public function get(string $key, $default = null)
    {
        if ($this->has($key)) {
            return $this->pool->getItem($key)->get();
        } else {
            return $default;
        }
    }

    /**
     * store items in the cache
     *
     * @param string $key
     * @param        $value
     * @param int    $minutes
     *
     * @return mixed
     * @throws \Psr\Cache\InvalidArgumentException
     */
    public function put(string $key, $value, int $minutes = 1)
    {
        // Get an item (existing or new)
        $item = $this->pool->getItem($key);

        $item->set($value);
        $item->expiresAfter($minutes * 60);
        $this->pool->save($item);

        return $value;
    }

    /**
     * retrieve an item from the cache and then delete the item
     *
     * @param string $key
     *
     * @return mixed
     * @throws \Psr\Cache\InvalidArgumentException
     */
    public function pull(string $key)
    {
        $value = $this->get($key);

        $this->pool->deleteItem($key);

        return $value;
    }
}