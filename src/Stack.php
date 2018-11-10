<?php
declare(strict_types=1);

namespace Webkonstruktor\Collection;


class Stack
{
    private $items = [];

    public function isEmpty(): bool
    {
        return empty($this->items);
    }

    public function add($item): void
    {
        $this->items[] = $item;
    }

    public function count(): int
    {
        return count($this->items);
    }

    public function pop()
    {
        $size = $this->count();

        $element = $this->items[$size-1];
        unset($this->items[$size-1]);

        return $element;
    }
}