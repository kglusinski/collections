<?php
declare(strict_types=1);

namespace Webkonstruktor\Collection;


interface Collection extends \Countable, \JsonSerializable, \IteratorAggregate
{
    public function isEmpty(): bool;
    public function clear(): void;
}