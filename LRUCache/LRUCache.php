<?php

declare(strict_types=1);

namespace App\LRUCache;

use Exception;

class Node
{
    private ?int $data;
    private ?int $key;

    private ?Node $next;
    private ?Node $prev;

    public function __construct(?int $key = null, ?int $data = null)
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

    public function setData(int $data): self
    {
        $this->data = $data;

        return $this;
    }

    public function getKey(): int
    {
        return $this->key;
    }
}

class Queue
{
    private Node $head;
    private Node $tail;

    public function __construct()
    {
        $this->head = new Node();
        $this->tail = new Node();

        $this->head->setNext($this->tail);
        $this->tail->setPrev($this->head);
    }

    public function remove(Node $node): void
    {
        $node->getPrev()->setNext($node->getNext());
        $node->getNext()->setPrev($node->getPrev());
    }

    public function attach(Node $node): void
    {
        $node->setPrev($this->head);
        $node->setNext($this->head->getNext());

        $node->getNext()->setPrev($node);
        $node->getPrev()->setNext($node);
    }

    public function upPriority(Node $node): void
    {
        $this->remove($node);
        $this->attach($node);
    }

    public function removeOld(): int
    {
        $nodeToRemove = $this->tail->getPrev();
        $this->remove($nodeToRemove);

        return $nodeToRemove->getKey();
    }
}

class Cache
{
    private int $capacity;

    /** @var array<int, Node> */
    private array $hashMap = [];

    public function __construct(int $capacity)
    {
        $this->capacity = $capacity;
    }

    public function isFull(): bool
    {
        return sizeof($this->hashMap) > $this->capacity;
    }

    /**
     * @throws Exception
     */
    public function get(int $ket): Node
    {
        if (false === isset($this->hashMap[$ket])) {
            throw new NotFountException();
        }

        return $this->hashMap[$ket];
    }

    public function remove(int $key): void
    {
        unset($this->hashMap[$key]);
    }

    public function add(int $key, Node $node): void
    {
        $this->hashMap[$key] = $node;
    }
}

class NotFountException extends Exception
{
}

class LRUCache
{
    private Cache $cache;
    private Queue $queue;

    public function __construct(int $capacity)
    {
        $this->queue = new Queue();
        $this->cache = new Cache($capacity);
    }

    public function get(int $key): int
    {
        try {
            $node = $this->cache->get($key);
        } catch (NotFountException $exception) {
            return -1;
        }

        $this->queue->upPriority($node);

        return $node->getData();
    }

    public function put(int $key, int $value): void
    {
        try {
            $node = $this->cache->get($key);

            $this->update($node, $value);
        } catch (NotFountException $exception) {
            $this->add($key, $value);
        }
    }

    private function add(int $key, int $value): void
    {
        $node = new Node($key, $value);
        $this->cache->add($key, $node);
        $this->queue->attach($node);

        if (true === $this->cache->isFull()) {
            $this->cache->remove(
                $this->queue->removeOld()
            );
        }
    }

    private function update(Node $node, int $value): void
    {
        $node->setData($value);
        $this->queue->upPriority($node);
    }
}
