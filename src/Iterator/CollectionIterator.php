<?php
declare(strict_types=1);

namespace Webkonstruktor\Collection;


interface CollectionIterator extends \Iterator
{
    public function setElements(array $elements): void;
}