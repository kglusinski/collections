<?php
declare(strict_types=1);

namespace Webkonstruktor\Collection\Iterator;

interface CollectionIterator extends \Iterator
{
    public function setElements(array $elements): void;
}