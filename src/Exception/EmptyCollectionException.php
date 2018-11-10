<?php
declare(strict_types=1);

namespace Webkonstruktor\Collection\Exception;


class EmptyCollectionException extends \Exception
{

    /**
     * EmptyCollectionException constructor.
     * @param string $type
     */
    public function __construct(string $type)
    {
        parent::__construct("Cannot get item from collection type: $type. This collection is empty.");
    }
}