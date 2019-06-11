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

    public function contain($element): bool
    {
        return in_array($element, $this->elements, true);
    }

    public function containAll($elements): bool
    {
        if ($elements instanceof Collection) {
            $it = $elements->getIterator();
            for ($it->rewind(); $it->valid(); $it->next()) {
                $result = $this->contain($it->current());

                if (!$result) return false;
            }
        }

        if (is_array($elements)) {
            foreach ($elements as $element) {
                $result = $this->contain($element);

                if (!$result) return false;
            }
        }

        return true;
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