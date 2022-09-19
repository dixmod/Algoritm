<?php

declare(strict_types=1);

namespace App\LRUCache;


class Node
{
    private int $data;
    private int $key;
    private ?Node $next;
    private ?Node $prev;

    public function __construct(int $data, int $key)
    {
        $this->data = $data;
        $this->key = $key;
    }

    public function getNext(): ?Node
    {
        return $this->next;
    }

    public function setNext(?Node $next): self
    {
        $this->next = $next;

        return $this;
    }

    public function getPrev(): ?Node
    {
        return $this->prev;
    }

    public function setPrev(?Node $prev): self
    {
        $this->prev = $prev;

        return $this;
    }

    public function getData(): int
    {
        return $this->data;
    }
}

class LRUCache
{
    private int $capacity;

    /** @var Node[]  */
    private array $cache = [];

    /** @var Node  */
    private $head = null;

    private int $countPuts = 0;

    function __construct(int $capacity)
    {
        $this->capacity = $capacity;
    }

    function get(int $key): int
    {
        if (false === array_key_exists($key, $this->cache)) {
            return -1;
        }

        $this->upKey($key);

        return $this->cache[$key]->getData();
    }

    function put(int $key, int $value): void
    {
        if (false === array_key_exists($key, $this->cache)) {
            if($this->countPuts >= $this->capacity){
                $this->delOld();
            }

            ++$this->countPuts;
        }

        $this->upKey($key);

        $this->cache[$key] = new Node($value, $key);
    }

    private function upKey(int $key): void
    {
//        $this->queue = array_diff($this->queue, [$key]);
//
//        $this->queue[] = $key;
    }

    private function delOld(): void
    {

        //unset($this->cache[array_shift($this->queue)]);
    }
}




/*$obj = new LRUCache(2);
$obj->put(2, 1);print_r($obj);
$obj->put(1, 1);print_r($obj);
$obj->put(2, 3);print_r($obj);
$obj->put(4, 1);print_r($obj);
$obj->get(1); print_r($obj);
$obj->get(2); print_r($obj);*/


$obj = new LRUCache(10);
$obj->put(10, 13); print_r($obj);
$obj->put(3, 17); print_r($obj);
$obj->put(6, 11); print_r($obj);
$obj->put(10, 5); print_r($obj);
$obj->put(9, 10); print_r($obj);
$obj->get(13); print_r($obj);
$obj->put(2, 19); print_r($obj);
$obj->get(2); print_r($obj);
$obj->get(3); print_r($obj);
$obj->put(5, 25); print_r($obj);
$obj->get(8); print_r($obj);
$obj->put(9, 22); print_r($obj);
$obj->put(5, 5); print_r($obj);
$obj->put(1, 30); print_r($obj); echo '---';///
$obj->get(11); print_r($obj);
$obj->put(9, 12); print_r($obj);
$obj->get(7); print_r($obj);
$obj->get(5); print_r($obj);
$obj->get(8); print_r($obj);
$obj->get(9); print_r($obj);
$obj->put(4, 30); print_r($obj);
$obj->put(9, 3); print_r($obj);
$obj->get(9); print_r($obj);
$obj->get(10); print_r($obj);
$obj->get(10); print_r($obj);
$obj->put(6, 14); print_r($obj);
$obj->put(3, 1); print_r($obj);
$obj->get(3); print_r($obj);
$obj->put(10, 11); print_r($obj);
$obj->get(8); print_r($obj);
$obj->put(2, 14); print_r($obj);
print_r($obj->get(1)); //print_r($obj); // 30
//print_r($obj->get(5)); print_r($obj);
//$obj->get(4); print_r($obj);
//$obj->put(11, 4); print_r($obj);
//$obj->put(12, 24); print_r($obj);
//$obj->put(5, 18); print_r($obj);
//$obj->get(13); print_r($obj);
//$obj->put(7, 23); print_r($obj);
//$obj->get(8); print_r($obj);
//$obj->get(12); print_r($obj);
//$obj->put(3, 27); print_r($obj);
//$obj->put(2, 12); print_r($obj);
//$obj->get(5); print_r($obj);
//$obj->put(2, 9); print_r($obj);
//$obj->put(13, 4); print_r($obj);
//$obj->put(8, 18); print_r($obj);
//$obj->put(1, 7); print_r($obj);
//$obj->get(6); print_r($obj);
//$obj->put(9, 29); print_r($obj);
//$obj->put(8, 21); print_r($obj);
//$obj->get(5); print_r($obj);
//$obj->put(6, 30); print_r($obj);
//$obj->put(1, 12); print_r($obj);
//$obj->get(10); print_r($obj);
//$obj->put(4, 15); print_r($obj);
//$obj->put(7, 22); print_r($obj);
//$obj->put(11, 26); print_r($obj);
//$obj->put(8, 17); print_r($obj);
//$obj->put(9, 29); print_r($obj);
//$obj->get(5); print_r($obj);
//$obj->put(3, 4); print_r($obj);
//$obj->put(11, 30); print_r($obj);
//$obj->get(12); print_r($obj);
//$obj->put(4, 29); print_r($obj);
//$obj->get(3); print_r($obj);
//$obj->get(9); print_r($obj);
//$obj->get(6); print_r($obj);
//$obj->put(3, 4); print_r($obj);
//$obj->get(1); print_r($obj);
//$obj->get(10); print_r($obj);
//$obj->put(3, 29); print_r($obj);
//$obj->put(10, 28); print_r($obj);
//$obj->put(1, 20); print_r($obj);
//$obj->put(11, 13); print_r($obj);
//$obj->get(3); print_r($obj);
//$obj->put(3, 12); print_r($obj);
//$obj->put(3, 8); print_r($obj);
//$obj->put(10, 9); print_r($obj);
//$obj->put(3, 26); print_r($obj);
//$obj->get(8); print_r($obj);
//$obj->get(7); print_r($obj);
//$obj->get(5); print_r($obj);
//$obj->put(13, 17); print_r($obj);
//$obj->put(2, 27); print_r($obj);
//$obj->put(11, 15); print_r($obj);
//$obj->get(12); print_r($obj);
//$obj->put(9, 19); print_r($obj);
//$obj->put(2, 15); print_r($obj);
//$obj->put(3, 16); print_r($obj);
//$obj->get(1); print_r($obj);
//$obj->put(12, 17); print_r($obj);
//$obj->put(9, 1); print_r($obj);
//$obj->put(6, 19); print_r($obj);
//$obj->get(4); print_r($obj);
//$obj->get(5); print_r($obj);
//$obj->get(5); print_r($obj);
//$obj->put(8, 1); print_r($obj);
//$obj->put(11, 7); print_r($obj);
//$obj->put(5, 2); print_r($obj);
//$obj->put(9, 28); print_r($obj);
//$obj->get(1); print_r($obj);
//$obj->put(2, 2); print_r($obj);
//$obj->put(7, 4); print_r($obj);
//$obj->put(4, 22); print_r($obj);
//$obj->put(7, 24); print_r($obj);
//$obj->put(9, 26); print_r($obj);
//$obj->put(13, 28); print_r($obj);
//$obj->put(11, 26); print_r($obj);
