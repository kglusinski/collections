<?php
declare(strict_types=1);

namespace Webkonstruktor\Collection;

class Set extends AbstractCollection
{
    public function push($element): void
    {
        if (!$this->contain($element)) {
            $this->elements[] = $element;
            $this->updateIterator();
        }
    }

    public function clear(): void
    {
        $this->elements = [];
        $this->updateIterator();
    }

    public function fromArray(array $items)
    {
        foreach ($items as $item) {
            $this->push($items);
        }
    }
}