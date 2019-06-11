<?php
declare(strict_types=1);

namespace Webkonstruktor\Collection;

use Webkonstruktor\Collection\Exception\EmptyCollectionException;

class Queue extends AbstractCollection
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

        $element = $this->elements[0];
        unset($this->elements[0]);
        $this->elements = array_values($this->elements);
        $this->iterator->setElements($this->elements);

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