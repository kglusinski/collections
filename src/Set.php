<?php
declare(strict_types=1);

namespace Webkonstruktor\Collection;

class Set extends AbstractCollection
{
    public function push($element): void
    {
        if (!$this->contain($element)) {
            $this->elements[] = $element;
        }
    }

    public function contain($element): bool
    {
        return in_array($element, $this->elements, true);
    }

    public function clear(): void
    {
        $this->elements = [];
    }
}