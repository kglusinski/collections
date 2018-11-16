<?php
declare(strict_types=1);

namespace Webkonstruktor\Collection;


use Webkonstruktor\Collection\Exception\InvalidElementTypeException;

class TypedStack extends Stack
{
    private $validator;
    private $type;

    public function __construct(string $type, DefaultTypeValidator $validator, CollectionIterator $iterator)
    {
        $this->type = $type;
        $this->validator = $validator;

        parent::__construct($iterator);
    }

    public function push($item): void
    {
        if (!$this->validator->validate($item, $this->type)) {
            throw new InvalidElementTypeException(gettype($item), $this->type);
        }

        parent::push($item);
    }
}