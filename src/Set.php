<?php
declare(strict_types=1);

namespace Webkonstruktor\Collection;


class Set implements Collection
{
    private $elements = [];

    public function isEmpty(): bool
    {
        return empty($this->elements);
    }

    public function push($element): void
    {
        if (!$this->contain($element)) {
            $this->elements[] = $element;
        }
    }

    public function count(): int
    {
        return count($this->elements);
    }

    public function contain($element): bool
    {
        return in_array($element, $this->elements, true);
    }

    public function clear(): void
    {
        $this->elements = [];
    }

    //todo implement iterator
}