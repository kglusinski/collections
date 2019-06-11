<?php

declare(strict_types=1);

namespace Webkonstruktor\Collection;

use Webkonstruktor\Collection\Exception\KeyNotFoundException;

class Map extends AbstractCollection
{
    public function put(string $key, $value): void
    {
        $this->elements[$key] = $value;
    }

    public function get(string $key)
    {
        if (!array_key_exists($key, $this->elements)) {
            throw new KeyNotFoundException($key);
        }

        return $this->elements[$key];
    }

    public function clear(): void
    {
        $this->elements = [];
    }

    public function fromArray(array $items)
    {
        foreach ($items as $index => $item) {
            $this->put($index, $item);
        }
    }
}