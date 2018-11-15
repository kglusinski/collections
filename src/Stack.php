<?php
declare(strict_types=1);

namespace Webkonstruktor\Collection;


use Webkonstruktor\Collection\Exception\EmptyCollectionException;

class Stack implements Collection
{
    private $items = [];

    public function isEmpty(): bool
    {
        return empty($this->items);
    }

    public function push($item): void
    {
        $this->items[] = $item;
    }

    public function count(): int
    {
        return count($this->items);
    }

    public function pop()
    {
        if ($this->isEmpty()) {
            throw new EmptyCollectionException(self::class);
        }

        $size = $this->count();

        $element = $this->items[$size-1];
        unset($this->items[$size-1]);

        return $element;
    }

    public function clear(): void
    {
        while (!$this->isEmpty()) {
            $this->pop();
        }
    }

    public function jsonSerialize()
    {
        return $this->items;
    }


}