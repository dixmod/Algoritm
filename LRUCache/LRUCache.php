<?php

declare(strict_types=1);

namespace App\LRUCache;

class LRUCache
{
    public int $capacity;
    public array $cache = [];
    public array $queue = [];
    public int $size = 0;

    function __construct(int $capacity)
    {
        $this->capacity = $capacity;
    }

    function get(int $key): int
    {
        if (false === array_key_exists($key, $this->cache)) {
            return -1;
        }

        $this->updateQueue($key);

        return $this->cache[$key];
    }

    function put(int $key, int $value): void
    {
        if (true === $this->needClear($key)) {
            $delKey = array_shift($this->queue);

            unset($this->cache[$delKey]);
            --$this->size;
        }

        $this->updateQueue($key);
        ++$this->size;

        $this->cache[$key] = $value;
    }

    private function needClear(int $key): bool
    {
        return false === array_key_exists($key, $this->cache) && $this->size >= $this->capacity;
    }

    private function updateQueue(int $key): void
    {
        $this->queue = array_diff($this->queue, [$key]);
        $this->queue[] = $key;
    }
}

/*$obj = new LRUCache(10);
$obj->put(2, 1);print_r($obj);
$obj->put(1, 1);print_r($obj);
$obj->put(2, 3);print_r($obj);
$obj->put(4, 1);print_r($obj);
$obj->get(1); print_r($obj);
$obj->get(2); print_r($obj);*/

