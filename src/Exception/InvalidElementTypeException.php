<?php
declare(strict_types=1);

namespace Webkonstruktor\Collection\Exception;


class InvalidElementTypeException extends \Exception
{
    /**
     * EmptyCollectionException constructor.
     * @param string $type
     * @param string $acceptType
     */
    public function __construct(string $type, string $acceptType)
    {
        parent::__construct("Cannot push item of type: $type. This collection accept only $acceptType.");
    }
}