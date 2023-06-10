<?php


namespace App\Services;

use Psr\Cache\InvalidArgumentException;
use Symfony\Component\Cache\Adapter\AdapterInterface;
use Psr\Cache\CacheItemPoolInterface;
use Symfony\Component\DependencyInjection\Attribute\Autowire;


class HandlerCache
{
    private CacheItemPoolInterface $cache;

    public function __construct(CacheItemPoolInterface $cache)
    {
        $this->cache = $cache;
    }

    /**
     * @throws InvalidArgumentException
     */
    public function clearCache($key): void
    {
        $this->cache->deleteItem($key);
    }

    public function clearAllCache(): void
    {
        $this->cache->clear();
    }

    /**
     * @throws InvalidArgumentException
     */
    public function getData($key)
    {
        $cacheItem = $this->cache->getItem($key);

        if (!$cacheItem->isHit()) {
            $data = $this->fetchDataFromSource();

            $cacheItem->set($data);
            $this->cache->save($cacheItem);
        } else {
            $data = $cacheItem->get();
        }

        return $data;
    }

    private function fetchDataFromSource(): array
    {
        return ["Palestine", "Maroc"];
    }
}