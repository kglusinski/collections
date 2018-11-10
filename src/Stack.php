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
}