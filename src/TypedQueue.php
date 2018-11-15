<?php
declare(strict_types=1);

namespace Webkonstruktor\Collection;


use Webkonstruktor\Collection\Exception\InvalidElementTypeException;

class TypedQueue extends Queue
{
    /** @var string */
    private $type;

    /** @var DefaultTypeValidator */
    private $validator;

    public function __construct(string $type, DefaultTypeValidator $validator)
    {
        $this->type = $type;
        $this->validator = $validator;
    }

    public function push($item): void
    {
        if (!$this->validator->validate($item, $this->type)) {
            throw new InvalidElementTypeException(gettype($item), $this->type);
        }

        parent::push($item);
    }
}