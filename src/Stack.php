<?php
declare(strict_types=1);

namespace Webkonstruktor\Collection;

use Webkonstruktor\Collection\Exception\EmptyCollectionException;

class Stack extends AbstractCollection
{
    public function push($item): void
    {
        $this->elements[] = $item;
        $this->iterator->setElements($this->elements);
    }

    public function pop()
    {
        if ($this->isEmpty()) {
            throw new EmptyCollectionException(self::class);
        }

        $size = $this->count();

        $element = $this->elements[$size-1];
        unset($this->elements[$size-1]);

        return $element;
    }

    public function clear(): void
    {
        while (!$this->isEmpty()) {
            $this->pop();
        }
    }

    public function fromArray(array $items)
    {
        foreach ($items as $item) {
            $this->push($item);
        }
    }
}