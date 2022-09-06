<?php

declare(strict_types=1);

namespace App\LRUCache;

class LRUCache
{
    private int $capacity;
    private array $cache = [];
    private array $queue = [];
    private int $countPut = 0;

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
            unset($this->cache[array_shift($this->queue)]);
        }

        $this->updateQueue($key);
        ++$this->countPut;

        $this->cache[$key] = $value;
    }

    private function needClear(int $key): bool
    {
        return false === array_key_exists($key, $this->cache) && $this->countPut >= $this->capacity;
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



//[10,13],[3,17],[6,11],[10,5],[9,10],[13],[2,19],[2],[3],[5,25],[8],[9,22],[5,5],[1,30],[11],[9,12],[7],[5],[8],[9],[4,30],[9,3],[9],[10],[10],[6,14],[3,1],[3],[10,11],[8],[2,14],[1],[5],[4],[11,4],[12,24],[5,18],[13],[7,23],[8],[12],[3,27],[2,12],[5],[2,9],[13,4],[8,18],[1,7],[6],[9,29],[8,21],[5],[6,30],[1,12],[10],[4,15],[7,22],[11,26],[8,17],[9,29],[5],[3,4],[11,30],[12],[4,29],[3],[9],[6],[3,4],[1],[10],[3,29],[10,28],[1,20],[11,13],[3],[3,12],[3,8],[10,9],[3,26],[8],[7],[5],[13,17],[2,27],[11,15],[12],[9,19],[2,15],[3,16],[1],[12,17],[9,1],[6,19],[4],[5],[5],[8,1],[11,7],[5,2],[9,28],[1],[2,2],[7,4],[4,22],[7,24],[9,26],[13,28],[11,26]]

