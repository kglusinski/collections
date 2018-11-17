<?php
declare(strict_types=1);

namespace Webkonstruktor\Collection\Iterator;

class DefaultCollectionIterator implements CollectionIterator
{
    private $elements = [];
    private $index = 0;

    public function setElements(array $elements): void
    {
        $this->elements = $elements;
    }

    /**
     * @inheritdoc
     */
    public function current()
    {
        return $this->elements[$this->index];
    }

    /**
     * @inheritdoc
     */
    public function next(): void
    {
        $this->index++;
    }

    /**
     * @inheritdoc
     */
    public function key(): int
    {
        return $this->index;
    }

    /**
     * @inheritdoc
     */
    public function valid()
    {
        return isset($this->elements[$this->index]);
    }

    /**
     * @inheritdoc
     */
    public function rewind(): void
    {
        $this->index = 0;
    }
}